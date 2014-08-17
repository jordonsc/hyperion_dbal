<?php
namespace Hyperion\Dbal\Reports\Traits;


trait ActionListTrait
{

    /**
     * @JMS\Serializer\Annotation\Type("array<integer>")
     * @var int[]
     */
    protected $actions;

    /**
     * Get a list of action IDs
     *
     * @return int[]
     */
    public function getActions()
    {
        return $this->actions;
    }

} 