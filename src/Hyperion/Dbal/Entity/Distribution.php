<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\DistributionStatus;
use JMS\Serializer\Annotation as Serializer;

class Distribution extends HyperionEntity
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $environment;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $status;

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

    /**
     * Set Status
     *
     * @param DistributionStatus $status
     * @return $this
     */
    public function setStatus(DistributionStatus $status)
    {
        $this->status = $status->value();
        return $this;
    }

    /**
     * Get Status
     *
     * @return DistributionStatus
     */
    public function getStatus()
    {
        return DistributionStatus::memberByValue($this->status);
    }

    /**
     * Set Environment
     *
     * @param int $environment
     * @return $this
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * Get Environment
     *
     * @return int
     */
    public function getEnvironment()
    {
        return $this->environment;
    }


}
