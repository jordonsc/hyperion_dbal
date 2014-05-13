<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\InstanceState;
use JMS\Serializer\Annotation as Serializer;

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
    protected $distribution;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $state;

    // --

    /**
     * Set Distribution
     *
     * @param int $distribution
     * @return $this
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
        return $this;
    }

    /**
     * Get Distribution
     *
     * @return int
     */
    public function getDistribution()
    {
        return $this->distribution;
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
     * @param InstanceState $state
     * @return $this
     */
    public function setState(InstanceState $state)
    {
        $this->state = $state->value();
        return $this;
    }

    /**
     * Get State
     *
     * @return InstanceState
     */
    public function getState()
    {
        return InstanceState::memberByValue($this->state);
    }

}
