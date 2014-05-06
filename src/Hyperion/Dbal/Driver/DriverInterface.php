<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Enum\Entity;

interface DriverInterface
{

    /**
     * Create a new entity
     *
     * @param HyperionEntity $entity
     */
    public function create(HyperionEntity $entity);

    /**
     * Get an entity by it's primary key
     *
     * @param Entity $entity
     * @param mixed  $id
     */
    public function retrieve(Entity $entity, $id);

    /**
     * Update an entity
     *
     * @param HyperionEntity $entity
     */
    public function update(HyperionEntity $entity);

    /**
     * Delete an entity
     *
     * @param HyperionEntity $entity
     */
    public function delete(HyperionEntity $entity);


}