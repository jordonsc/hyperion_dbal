<?php
namespace Hyperion\ApiBundle\Entity;

use Hyperion\Dbal\Entity\HyperionEntity;

class Instance extends HyperionEntity
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $instance_id;

    /**
     * @ORM\Column(type="string")
     */
    protected $instance_name;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $state;

    // --

    /**
     * Set DistributionId
     *
     * @param int $distribution_id
     * @return $this
     */
    public function setDistributionId($distribution_id)
    {
        $this->distribution_id = $distribution_id;
        return $this;
    }

    /**
     * Get DistributionId
     *
     * @return int
     */
    public function getDistributionId()
    {
        return $this->distribution_id;
    }

    /**
     * Set InstanceId
     *
     * @param string $instance_id
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->instance_id = $instance_id;
        return $this;
    }

    /**
     * Get InstanceId
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->instance_id;
    }

    /**
     * Set InstanceName
     *
     * @param mixed $instance_name
     * @return $this
     */
    public function setInstanceName($instance_name)
    {
        $this->instance_name = $instance_name;
        return $this;
    }

    /**
     * Get InstanceName
     *
     * @return mixed
     */
    public function getInstanceName()
    {
        return $this->instance_name;
    }

    /**
     * Set State
     *
     * @param int $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get State
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

}
