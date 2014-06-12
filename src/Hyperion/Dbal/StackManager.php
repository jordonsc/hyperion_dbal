<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Collection\EntityCollection;
use Hyperion\Dbal\Driver\DataDriverInterface;
use Hyperion\Dbal\Driver\StackDriverInterface;
use Hyperion\Dbal\Entity\Environment;
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

    /**
     * Bake a project using given environment
     *
     * @param Environment $env
     */
    public function bake(Environment $env)
    {

    }

    /**
     * Perform a CI build
     *
     * @param Environment $env
     */
    public function build(Environment $env)
    {

    }

    /**
     * Release/deploy a project
     *
     * @param Environment $env
     */
    public function deploy(Environment $env)
    {

    }

    /**
     * Horizontally scale a deployed project
     *
     * @param Environment $env
     * @param int         $delta
     */
    public function scale(Environment $env, $delta)
    {

    }

    /**
     * Completely tear-down a project
     *
     * @param Environment $env
     */
    public function tearDown(Environment $env)
    {

    }

} 