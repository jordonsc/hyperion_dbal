<?php

namespace Hyperion\Dbal\Entity;

use JMS\Serializer\Annotation as Serializer;

class Project extends HyperionEntity
{
    /**
     * Get the primary key of the project
     *
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Set the primary key of the project
     *
     * @param int $pk
     * @return $this
     */
    public function setPrimaryKey($pk)
    {
        return $this->setId($pk);
    }

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $id;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $name;

    /**
     * Set Id
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
     * Get Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

} 