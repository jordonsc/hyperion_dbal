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
    protected $output;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $error_message;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $phase;

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
     * Set ErrorMessage
     *
     * @param string $error_message
     * @return $this
     */
    public function setErrorMessage($error_message)
    {
        $this->error_message = $error_message;
        return $this;
    }

    /**
     * Get ErrorMessage
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->error_message;
    }

    /**
     * Set Output
     *
     * @param string $output
     * @return $this
     */
    public function setOutput($output)
    {
        $this->output = $output;
        return $this;
    }

    /**
     * Get Output
     *
     * @return string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * Set Phase
     *
     * @param string $phase
     * @return $this
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
        return $this;
    }

    /**
     * Get Phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

}
