<?php
namespace Hyperion\Dbal\Driver;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Guzzle\Http\Message\Response;
use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;
use Hyperion\Dbal\Exception\BadDataException;
use Hyperion\Dbal\Exception\NotFoundException;
use Hyperion\Dbal\Exception\RequestException;
use Hyperion\Dbal\Exception\UnexpectedResponseException;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

class ApiDriver implements DriverInterface
{
    const API_VERSION  = '/api/v1/';
    const API_HOSTNAME = 'api.hyperion.dev';
    const API_FORMAT   = 'json';

    protected $api_hostname;
    protected $serializer = null;

    public function __construct($hostname = null)
    {
        $this->api_hostname = $hostname ?: self::API_HOSTNAME;

        // This forces the class to be auto-loaded, so that the doctrine annotation loader doesn't fail
        new Type;
        new Accessor;
    }

    /**
     * Get an HTTP client for an API call
     *
     * @return Client
     */
    protected function getClient()
    {
        return new Client('http://'.$this->api_hostname);
    }

    /**
     * Get a serialiser service
     *
     * @return Serializer
     */
    protected function getSerialiser()
    {
        if (!$this->serializer) {
            $this->serializer = SerializerBuilder::create()->build();
        }

        return $this->serializer;
    }

    /**
     * Make an API call
     *
     * @param string   $method
     * @param string   $uri
     * @param string[] $headers
     * @param object   $payload
     * @param string   $deserialise_object
     * @return Response|mixed
     * @throws RequestException
     * @throws NotFoundException
     */
    protected function call($method, $uri, $payload = null, $deserialise_object = null)
    {
        // Serialisation
        if (is_object($payload)) {
            $data_payload = $this->serialise($payload);
        } else {
            $data_payload = $payload;
        }

        // API call
        try {
            $response = $this->getClient()->createRequest(
                $method,
                self::API_VERSION.$uri.'.'.self::API_FORMAT,
                null,
                $data_payload
            )->send();

        } catch (ClientErrorResponseException $e) {
            // 4xx errors
            $r = $e->getResponse();
            if ($r->getStatusCode() == 404) {
                throw new NotFoundException($r->getMessage(), 404, $e);
            } else {
                throw new RequestException($r->getMessage(), $r->getStatusCode(), $e);
            }
        } catch (ServerErrorResponseException $e) {
            // 5xx errors
            $r = $e->getResponse();
            throw new RequestException($r->getMessage(), $r->getStatusCode(), $e);
        }

        // Deserialisation
        if ($deserialise_object) {
            return $this->deserialise($deserialise_object, $response->getBody());
        } else {
            return $response;
        }

    }

    /**
     * Serialise the entity
     *
     * @param object $obj
     * @param bool   $remove_pk Remove the primary key value from serialisation if the object is a HyperionEntity
     * @return string
     * @throws BadDataException
     */
    protected function serialise($obj = null, $remove_pk = true)
    {
        if (!$obj) {
            return null;
        }

        $pk = null;
        if ($remove_pk && ($obj instanceof HyperionEntity)) {
            $pk = $obj->getPrimaryKey();
            $obj->setPrimaryKey(null);
        }

        try {
            $payload = $this->getSerialiser()->serialize($obj, self::API_FORMAT);
        } catch (\Exception $e) {
            throw new BadDataException("Unable to serialise payload", 0, $e);
        }

        if ($remove_pk && ($obj instanceof HyperionEntity)) {
            $obj->setPrimaryKey($pk);
        }

        return $payload;
    }

    /**
     * Deserialise the content into an object
     *
     * @param string $deserialse_object Fully-qualified class name of the return object
     * @param string $content
     * @return mixed
     * @throws UnexpectedResponseException
     */
    protected function deserialise($deserialse_object, $content)
    {
        try {
            return $this->getSerialiser()->deserialize($content, $deserialse_object, self::API_FORMAT);
        } catch (\Exception $e) {
            throw new UnexpectedResponseException("API server returned an unexpected response", 0, $e, $content);
        }
    }

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity
     * @return HyperionEntity
     */
    public function create(HyperionEntity $entity)
    {
        return $this->call(
            'POST',
            $entity::getSingularName(),
            $entity,
            'Hyperion\Dbal\Entity\\'.$entity::getSingularName()
        );
    }

    /**
     * Get an entity by it's primary key
     *
     * @param Entity $entity
     * @param mixed  $id
     * @return HyperionEntity
     */
    public function retrieve(Entity $entity, $id)
    {
        $entity_name = call_user_func($entity->value().'::getSingularName');

        return $this->call(
            'GET',
            $entity_name.'/'.$id,
            null,
            $entity->value()
        );
    }

    /**
     * Update an entity
     *
     * @param HyperionEntity $entity
     * @return HyperionEntity
     */
    public function update(HyperionEntity $entity)
    {
        return $this->call(
            'PUT',
            $entity::getSingularName().'/'.$entity->getPrimaryKey(),
            $entity,
            'Hyperion\Dbal\Entity\\'.$entity::getSingularName()
        );
    }

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity)
    {
        $this->call('DELETE', $entity::getSingularName().'/'.$entity->getPrimaryKey());
    }

    /**
     * Get an collection of entities
     *
     * @param Entity             $entity
     * @param CriteriaCollection $criteria
     * @return EntityCollection
     */
    public function search(Entity $entity, CriteriaCollection $criteria = null)
    {
        $r = $this->call(
            'GET',
            call_user_func($entity->value().'::getPluralName'),
            $criteria ? $criteria->getItems() : null,
            'ArrayCollection<'.$entity->value().'>'
        );

        return new EntityCollection($r);
    }

}
