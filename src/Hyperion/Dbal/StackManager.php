<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Driver\StackDriverInterface;
use Hyperion\Dbal\Entity\Environment;
use Hyperion\Dbal\Reports\BakeReport;

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
     * @param int $env
     * @return BakeReport
     */
    public function bake($env)
    {
        return $this->driver->bake($env);
    }

    /**
     * Perform a CI build
     *
     * @param int $env
     */
    public function build($env)
    {

    }

    /**
     * Release/deploy a project
     *
     * @param int $env
     */
    public function deploy($env)
    {

    }

    /**
     * Horizontally scale a deployed project
     *
     * @param int $env
     * @param int $delta
     */
    public function scale($env, $delta)
    {

    }

    /**
     * Completely tear-down a project
     *
     * @param int $env
     */
    public function tearDown(Environment $env)
    {

    }

} 