<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\BakeReport;
use Hyperion\Dbal\Reports\BuildReport;

interface StackDriverInterface
{
    /**
     * Bake a project
     *
     * @param int $env
     * @return BakeReport
     */
    public function bake($env);

    /**
     * Build a test environment
     *
     * @param int $env
     * @param string $name
     * @param string $tag_string
     * @return BuildReport
     */
    public function build($env, $name, $tag_string);

    public function deploy($env);

    public function scale($env, $delta);

    public function tearDown($env);

    // TODO: add some status getters
}