<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Driver\DataDriverInterface;
use Hyperion\Dbal\Driver\StackDriverInterface;
use Hyperion\Dbal\Entity\HyperionEntity;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Entity;

/**
 * The StackManager is responsible for controlling the application infrastructure stack
 */
class StackManager
{

    /**
     * @var StackDriverInterface
     */
    protected $driver;

    function __construct(StackDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function bake(Project $project)
    {

    }

    public function deploy(Project $project) {

    }

    public function scale(Project $project, $delta) {

    }

    public function tearDown(Project $project) {

    }

} 