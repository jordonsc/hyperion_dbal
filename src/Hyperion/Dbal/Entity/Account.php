<?php
namespace Hyperion\Dbal\Entity;

use JMS\Serializer\Annotation as Serializer;

class Account extends HyperionEntity
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $name;


    // --


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


    public function __toString()
    {
        return $this->getName();
    }

}
