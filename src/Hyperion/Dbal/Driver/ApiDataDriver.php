<?php
namespace Hyperion\Dbal\Driver;

use Guzzle\Http\Message\Response;
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
            $this->crud_prefix.$entity::getEntityName().'/new',
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
        $entity_name = call_user_func((string)$entity->value().'::getEntityName');

        return $this->call(
            'GET',
            $this->crud_prefix.$entity_name.'/'.$id,
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
            $this->crud_prefix.$entity::getEntityName().'/'.$entity->getId(),
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
        $this->call('DELETE', $this->crud_prefix.$entity::getEntityName().'/'.$entity->getId());
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
            $this->crud_prefix.call_user_func((string)$entity->value().'::getEntityName').'/search',
            $criteria ? $criteria->getItems() : null,
            'ArrayCollection<'.(string)$entity->value().'>'
        );

        return new EntityCollection($r);
    }

    /**
     * Get all entities
     *
     * @param Entity $entity
     * @return EntityCollection
     */
    public function retrieveAll(Entity $entity)
    {
        $r = $this->call(
            'GET',
            $this->crud_prefix.call_user_func((string)$entity->value().'::getEntityName').'/all',
            null,
            'ArrayCollection<'.(string)$entity->value().'>'
        );

        return new EntityCollection($r);
    }


    /**
     * Get all related entities
     *
     * @param HyperionEntity $entity
     * @param Entity         $related
     * @return EntityCollection
     */
    public function getRelatedEntities(HyperionEntity $entity, Entity $related)
    {
        $r = $this->call(
            'GET',
            $this->crud_prefix.$entity::getEntityName().'/'.$entity->getId().'/'.
            call_user_func((string)$related->value().'::getEntityName'),
            null,
            'ArrayCollection<'.(string)$related->value().'>'
        );

        return new EntityCollection($r);
    }

    /**
     * Add a relationship
     *
     * @param HyperionEntity $entity
     * @param HyperionEntity $related
     * @return bool
     */
    public function addRelationship(HyperionEntity $entity, HyperionEntity $related)
    {
        /** @var Response $r */
        $r = $this->call(
            'PUT',
            $this->crud_prefix.$entity::getEntityName().'/'.$entity->getId().'/'.
            $related::getEntityName().'/'.$related->getId(),
            null,
            null
        );

        return $r->getStatusCode() >= 200 && $r->getStatusCode() < 300;
    }

    /**
     * Remove a relationship
     *
     * @param HyperionEntity $entity
     * @param HyperionEntity $related
     * @return EntityCollection
     */
    public function removeRelationship(HyperionEntity $entity, HyperionEntity $related)
    {
        /** @var Response $r */
        $r = $this->call(
            'DELETE',
            $this->crud_prefix.$entity::getEntityName().'/'.$entity->getId().'/'.
            $related::getEntityName().'/'.$related->getId(),
            null,
            null
        );

        return $r->getStatusCode() >= 200 && $r->getStatusCode() < 300;
    }
}
