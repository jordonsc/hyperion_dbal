<?php

namespace Hyperion\Dbal;

use Hyperion\Dbal\Driver\StackDriverInterface;
use Hyperion\Dbal\Entity\Environment;
use Hyperion\Dbal\Exception\ParseException;
use Hyperion\Dbal\Reports\ActionReport;
use Hyperion\Dbal\Reports\BakeReport;
use Hyperion\Dbal\Reports\BuildReport;
use Hyperion\Dbal\Reports\MultiActionReport;
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
     * @return ActionReport
     */
    public function bake($env)
    {
        return $this->driver->bake($env);
    }

    /**
     * Build a test environment
     *
     * @param int    $env
     * @param string $name
     * @param string $tag_string
     * @return ActionReport
     * @throws ParseException
     */
    public function build($env, $name, $tag_string)
    {
        $helper = new TagStringHelper();
        return $this->driver->build($env, $name, $helper->cleanTagString($tag_string));
    }

    /**
     * Release/deploy an environment
     *
     * @param int $env
     * @return ActionReport
     */
    public function deploy($env)
    {
        return $this->driver->deploy($env);
    }

    /**
     * Horizontally scale a distribution
     *
     * @param int $env
     * @param int $delta
     * @return ActionReport
     */
    public function scale($env, $delta)
    {
        return $this->driver->scale($env, $delta);
    }


    /**
     * Tear down distribution
     *
     * @param int $distribution
     * @return ActionReport
     */
    public function tearDown($distribution)
    {
        return $this->driver->tearDown($distribution);
    }

    /**
     * Tear down all other distributions with the same name and environment
     *
     * @param int $distribution
     * @return MultiActionReport
     */
    public function tearDownOther($distribution)
    {
        return $this->driver->tearDownOther($distribution);
    }


} 