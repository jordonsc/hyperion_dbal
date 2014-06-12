<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\BakeReport;

/**
 * API driver for stack management
 */
class ApiStackDriver implements StackDriverInterface
{
    use ApiDriverTrait;

    /**
     * Bake a project
     *
     * @param int $env
     * @return BakeReport
     */
    public function bake($env)
    {
        return $this->call(
            'GET',
            'bake/'.(int)$env,
            null,
            'Hyperion\Dbal\Reports\BakeReport'
        );
    }

    public function build($env)
    {
        // TODO: Implement build() method.
    }

    public function deploy($env)
    {
        // TODO: Implement deploy() method.
    }

    public function scale($env, $delta)
    {
        // TODO: Implement scale() method.
    }

    public function tearDown($env)
    {
        // TODO: Implement tearDown() method.
    }

}
 