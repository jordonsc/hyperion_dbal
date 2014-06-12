<?php
namespace Hyperion\Dbal\Reports\Traits;


trait ActionTrait
{
    /**
     * @JMS\Serializer\Annotation\Type("integer")
     * @var int
     */
    protected $action;

    /**
     * Get the action ID
     *
     * @return int
     */
    public function getAction()
    {
        return $this->action;
    }

} 