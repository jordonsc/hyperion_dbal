<?php
namespace Hyperion\Dbal\Driver;

use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Guzzle\Http\Message\Response;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Exception\BadDataException;
use Hyperion\Dbal\Exception\NotFoundException;
use Hyperion\Dbal\Exception\RequestException;
use Hyperion\Dbal\Exception\UnexpectedResponseException;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

/**
 * Trait for all API driver implementations
 */
trait ApiDriverTrait
{
    protected $api_hostname = 'api.hyperion.dev';
    protected $api_version = '/api/v1/';
    protected $crud_prefix = 'entity/';
    protected $api_format = 'json';
    protected $serializer = null;

    public function __construct($hostname = null)
    {
        if ($hostname) {
            $this->api_hostname = $hostname;
        }

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
        if (is_array($payload) || is_object($payload)) {
            $data_payload = $this->serialise($payload);
        } else {
            $data_payload = $payload;
        }

        // API call
        try {
            $response = $this->getClient()->createRequest(
                $method,
                $this->api_version.$uri.'.'.$this->api_format,
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
        if (is_null($obj)) {
            return null;
        }

        $pk = null;
        if ($remove_pk && ($obj instanceof HyperionEntity)) {
            $pk = $obj->getId();
            $obj->setId(null);
        }

        try {
            $payload = $this->getSerialiser()->serialize($obj, $this->api_format);
        } catch (\Exception $e) {
            throw new BadDataException("Unable to serialise payload", 0, $e);
        }

        if ($remove_pk && ($obj instanceof HyperionEntity)) {
            $obj->setId($pk);
        }

        return $payload;
    }

    /**
     * Deserialise the content into an object
     *
     * @param string $deserialise_object Fully-qualified class name of the return object
     * @param string $content
     * @return mixed
     * @throws UnexpectedResponseException
     */
    protected function deserialise($deserialise_object, $content)
    {
        try {
            return $this->getSerialiser()->deserialize($content, $deserialise_object, $this->api_format);
        } catch (\Exception $e) {
            throw new UnexpectedResponseException("API server returned an unexpected response", 0, $e, $content);
        }
    }

}
 