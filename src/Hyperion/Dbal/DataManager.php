<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Driver\DataDriverInterface;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;

/**
 * The DataManager acts as an entity manager for all Hyperion data assets
 */
class DataManager
{

    /**
     * @var DataDriverInterface
     */
    protected $driver;

    function __construct(DataDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity This will be updated with any changes during persistence
     */
    public function create(HyperionEntity &$entity)
    {
        return $entity = $this->driver->create($entity);
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
     * @param HyperionEntity $entity This will be updated with any changes during persistence
     */
    public function update(HyperionEntity &$entity)
    {
        return $entity = $this->driver->update($entity);
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

    /**
     * Get all entities
     *
     * @param Entity             $entity
     * @return EntityCollection
     */
    public function retrieveAll(Entity $entity)
    {
        return $this->driver->retrieveAll($entity);
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
        return $this->driver->search($entity, $criteria);
    }


} 