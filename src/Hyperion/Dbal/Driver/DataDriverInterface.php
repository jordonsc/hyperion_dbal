<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;

interface DataDriverInterface
{

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity
     * @return HyperionEntity
     */
    public function create(HyperionEntity $entity);

    /**
     * Get an entity by it's primary key
     *
     * @param Entity $entity
     * @param mixed  $id
     * @return HyperionEntity
     */
    public function retrieve(Entity $entity, $id);

    /**
     * Update an entity
     *
     * @param HyperionEntity $entity
     * @return HyperionEntity
     */
    public function update(HyperionEntity $entity);

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity);

    /**
     * Get an collection of entities
     *
     * @param Entity             $entity
     * @param CriteriaCollection $criteria
     * @return EntityCollection
     */
    public function search(Entity $entity, CriteriaCollection $criteria = null);

    /**
     * Get all entities
     *
     * @param Entity $entity
     * @return EntityCollection
     */
    public function retrieveAll(Entity $entity);

    /**
     * Get all related entities
     *
     * @param HyperionEntity $entity
     * @param Entity         $related
     * @return EntityCollection
     */
    public function getRelatedEntities(HyperionEntity $entity, Entity $related);

    /**
     * Add a relationship
     *
     * @param HyperionEntity $entity
     * @param HyperionEntity $related
     * @return bool
     */
    public function addRelationship(HyperionEntity $entity, HyperionEntity $related);

    /**
     * Remove a relationship
     *
     * @param HyperionEntity $entity
     * @param HyperionEntity $related
     * @return bool
     */
    public function removeRelationship(HyperionEntity $entity, HyperionEntity $related);

}