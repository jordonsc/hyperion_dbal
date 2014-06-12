<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\BakeReport;

interface StackDriverInterface
{
    /**
     * Bake a project
     *
     * @param int $env
     * @return BakeReport
     */
    public function bake($env);

    public function build($env);

    public function deploy($env);

    public function scale($env, $delta);

    public function tearDown($env);

    // TODO: add some status getters
}