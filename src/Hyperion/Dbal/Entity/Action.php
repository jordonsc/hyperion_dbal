<?php
namespace Hyperion\ApiBundle\Entity;

use Hyperion\Dbal\Entity\HyperionEntity;

class Action extends HyperionEntity
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $action_type;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $state;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $project_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution_id;

    // --

    /**
     * Set ActionType
     *
     * @param int $action_type
     * @return $this
     */
    public function setActionType($action_type)
    {
        $this->action_type = $action_type;
        return $this;
    }

    /**
     * Get ActionType
     *
     * @return int
     */
    public function getActionType()
    {
        return $this->action_type;
    }

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
