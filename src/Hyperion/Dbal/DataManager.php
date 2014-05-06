<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Driver\DriverInterface;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;

class DataManager
{

    /**
     * @var DriverInterface
     */
    protected $driver;

    function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity
     */
    public function create(HyperionEntity $entity)
    {
        return $this->driver->create($entity);
    }

    /**
     * Get an entity by it's primary key
     *
     * @param Entity $entity
     * @param mixed  $id
     */
    public function retrieve(Entity $entity, $id)
    {
        return $this->driver->retrieve($entity, $id);
    }

    /**
     * Update an entity
     *
     * @param HyperionEntity $entity
     */
    public function update(HyperionEntity $entity)
    {
        return $this->driver->update($entity);
    }

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity)
    {
        return $this->driver->delete($entity);
    }

} 