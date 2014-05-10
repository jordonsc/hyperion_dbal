<?php
namespace Hyperion\Dbal\Entity;

abstract class HyperionEntity
{
    /**
     * Get the primary key of the entity
     *
     * @return mixed
     */
    abstract public function getPrimaryKey();

    /**
     * Set the primary key of the entity
     *
     * @param mixed $pk
     * @return $this
     */
    abstract public function setPrimaryKey($pk);

    public static function getSingularName() {
        $a = explode('\\', strtolower(get_called_class()));
        return array_pop($a);
    }

    public static function getPluralName() {
        return static::getSingularName().'s';
    }

} 