<?php
namespace Hyperion\Dbal\Entity;

use JMS\Serializer\Annotation as Serializer;

abstract class HyperionEntity
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $id;

    /**
     * Set the entities ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the entities ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the entity name of this class
     *
     * @return string
     */
    public static function getEntityName()
    {
        $a = explode('\\', strtolower(get_called_class()));
        return array_pop($a);
    }

    public function __toString()
    {
        return (string)$this->getId();
    }

} 