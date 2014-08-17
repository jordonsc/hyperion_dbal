<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\ActionReport;
use Hyperion\Dbal\Reports\MultiActionReport;

interface StackDriverInterface
{
    /**
     * Bake a project
     *
     * @param int $env
     * @return ActionReport
     */
    public function bake($env);

    /**
     * Build a test environment
     *
     * @param int $env
     * @param string $name
     * @param string $tag_string
     * @return ActionReport
     */
    public function build($env, $name, $tag_string);

    /**
     * Deploy an environment
     *
     * @param $env
     * @return ActionReport
     */
    public function deploy($env);

    /**
     * Horizontally scale a distribution
     *
     * @param int $distribution
     * @param int $delta
     * @return ActionReport
     */
    public function scale($distribution, $delta);

    /**
     * Tear down distribution
     *
     * @param int $distribution
     * @return ActionReport
     */
    public function tearDown($distribution);

    /**
     * Tear down all other distributions with the same name and environment
     *
     * @param int $distribution
     * @return MultiActionReport
     */
    public function tearDownOther($distribution);

}