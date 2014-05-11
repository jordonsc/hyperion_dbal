<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\ActionState;
use Hyperion\Dbal\Enum\ActionType;
use JMS\Serializer\Annotation as Serializer;

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
     * @param ActionType $action_type
     * @return $this
     */
    public function setActionType(ActionType $action_type)
    {
        $this->action_type = $action_type->value();
        return $this;
    }

    /**
     * Get ActionType
     *
     * @return ActionType
     */
    public function getActionType()
    {
        return ActionType::memberByValue($this->action_type);
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
     * @param ActionState $state
     * @return $this
     */
    public function setState(ActionState $state)
    {
        $this->state = $state->value();
        return $this;
    }

    /**
     * Get State
     *
     * @return ActionState
     */
    public function getState()
    {
        return ActionState::memberByValue($this->state);
    }

}
