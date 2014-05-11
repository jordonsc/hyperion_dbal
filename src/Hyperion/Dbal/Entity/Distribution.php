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
    protected $project_id;

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
     * Set ProjectId
     *
     * @param int $project_id
     * @return $this
     */
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
        return $this;
    }

    /**
     * Get ProjectId
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
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

}
