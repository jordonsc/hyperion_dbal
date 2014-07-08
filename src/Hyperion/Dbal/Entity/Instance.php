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
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution;

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

    public function __toString()
    {
        return $this->getInstanceId();
    }

}
