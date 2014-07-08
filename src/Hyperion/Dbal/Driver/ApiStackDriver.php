<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\BakeReport;
use Hyperion\Dbal\Reports\BuildReport;

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

    /**
     * Build a test environment
     *
     * @param int $env
     * @param string $name
     * @param string $tag_string
     * @return BuildReport
     */
    public function build($env, $name, $tag_string)
    {
        return $this->call(
            'GET',
            'build/'.(int)$env,
            ['name' => $name, 'tags' => $tag_string],
            'Hyperion\Dbal\Reports\BuildReport'
        );
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
 