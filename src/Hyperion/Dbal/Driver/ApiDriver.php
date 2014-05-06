<?php
namespace Hyperion\Dbal\Driver;

use Guzzle\Http\Client;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\SerializerBuilder;

class ApiDriver implements DriverInterface
{
    const API_VERSION = '/api/v1/';
    const API_HOSTNAME = 'api.hyperion.dev';

    public function __construct()
    {
        // This forces the class to be auto-loaded, so that the doctrine annotation loader doesn't fail
        new Type;
    }

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity
     * @return HyperionEntity
     */
    public function create(HyperionEntity $entity)
    {
        $client = new Client('http://'.self::API_HOSTNAME);
        $serializer = SerializerBuilder::create()->build();
        $payload = $serializer->serialize($entity, 'json');

        $entity_type = $entity::getSingularName();
        $response = $client->post(self::API_VERSION.$entity_type.'.json', [], $payload)->send();

        /** @var $created HyperionEntity */
        $created = $serializer->deserialize(
            $response->getBody(),
            'Hyperion\Dbal\Entity\\'.$entity_type,
            'json'
        );

        return $created;
    }

    /**
     * Get an entity by it's primary key
     *
     * @param Entity $entity
     * @param mixed  $id
     */
    public function retrieve(Entity $entity, $id)
    {
        // TODO: Implement retrieve() method.
    }

    /**
     * Update an entity
     *
     * @param HyperionEntity $entity
     */
    public function update(HyperionEntity $entity)
    {
        // TODO: Implement update() method.
    }

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity)
    {
        // TODO: Implement delete() method.
    }


} 