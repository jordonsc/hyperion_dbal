<?php
namespace Hyperion\Dbal\Entity;

abstract class HyperionEntity
{

    public static function getSingularName() {
        return array_pop(explode('\\', strtolower(get_called_class())));
    }

    public static function getPluralName() {
        return static::getSingularName().'s';
    }

} 