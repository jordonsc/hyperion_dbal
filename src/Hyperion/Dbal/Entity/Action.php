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
    protected $environment;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $workflow_data;

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

    /**
     * Set Workflow Data
     *
     * @param string $workflow_data
     * @return $this
     */
    public function setWorkflowData($workflow_data)
    {
        $this->workflow_data = $workflow_data;
        return $this;
    }

    /**
     * Get Workflow Data
     *
     * @return string
     */
    public function getWorkflowData()
    {
        return $this->workflow_data;
    }

}
