<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;

/**
 * API driver for all data management
 */
class ApiDataDriver implements DataDriverInterface
{
    use ApiDriverTrait;

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
            $entity::getEntityName().'/new',
            $entity,
            'Hyperion\Dbal\Entity\\'.$entity::getEntityName()
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
        $entity_name = call_user_func($entity->value().'::getEntityName');

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
            $entity::getEntityName().'/'.$entity->getId(),
            $entity,
            'Hyperion\Dbal\Entity\\'.$entity::getEntityName()
        );
    }

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity)
    {
        $this->call('DELETE', $entity::getEntityName().'/'.$entity->getId());
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
            'POST',
            call_user_func($entity->value().'::getEntityName').'/search',
            $criteria ? $criteria->getItems() : null,
            'ArrayCollection<'.$entity->value().'>'
        );

        return new EntityCollection($r);
    }

    /**
     * Get all entities
     *
     * @param Entity             $entity
     * @return EntityCollection
     */
    public function retrieveAll(Entity $entity)
    {
        $r = $this->call(
            'GET',
            call_user_func($entity->value().'::getEntityName').'/all',
            null,
            'ArrayCollection<'.$entity->value().'>'
        );

        return new EntityCollection($r);
    }

}
