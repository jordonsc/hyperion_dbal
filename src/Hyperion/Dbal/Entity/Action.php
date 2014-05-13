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
    protected $project;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution;

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
     * Set Project
     *
     * @param int $project
     * @return $this
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * Get Project
     *
     * @return int
     */
    public function getProject()
    {
        return $this->project;
    }

}
