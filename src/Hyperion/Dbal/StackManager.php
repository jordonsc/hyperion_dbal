<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Driver\StackDriverInterface;
use Hyperion\Dbal\Entity\Environment;
use Hyperion\Dbal\Exception\ParseException;
use Hyperion\Dbal\Reports\BakeReport;
use Hyperion\Dbal\Reports\BuildReport;
use Hyperion\Dbal\Utility\TagStringHelper;

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
     * Build a test environment
     *
     * @param int $env
     * @param string $name
     * @param string $tag_string
     * @return BuildReport
     * @throws ParseException
     */
    public function build($env, $name, $tag_string)
    {
        $helper = new TagStringHelper();
        return $this->driver->build($env, $name, $helper->cleanTagString($tag_string));
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