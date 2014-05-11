<?php
namespace Hyperion\ApiBundle\Entity;

use Hyperion\Dbal\Entity\HyperionEntity;
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


}
