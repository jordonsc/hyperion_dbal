<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Reports\ActionReport;
use Hyperion\Dbal\Reports\MultiActionReport;

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
     * @return ActionReport
     */
    public function bake($env)
    {
        return $this->call(
            'GET',
            'bake/'.(int)$env,
            null,
            'Hyperion\Dbal\Reports\ActionReport'
        );
    }

    /**
     * Build a test environment
     *
     * @param int $env
     * @param string $name
     * @param string $tag_string
     * @return ActionReport
     */
    public function build($env, $name, $tag_string)
    {
        return $this->call(
            'POST',
            'build/'.(int)$env,
            ['name' => $name, 'tags' => $tag_string],
            'Hyperion\Dbal\Reports\ActionReport'
        );
    }

    /**
     * Deploy an environment
     *
     * @param $env
     * @return ActionReport
     */
    public function deploy($env)
    {
        return $this->call(
            'GET',
            'deploy/'.(int)$env,
            null,
            'Hyperion\Dbal\Reports\ActionReport'
        );
    }

    /**
     * Horizontally scale a distribution
     *
     * @param int $distribution
     * @param int $delta
     * @return ActionReport
     */
    public function scale($distribution, $delta)
    {
        return $this->call(
            'GET',
            'scale/'.(int)$distribution.'/'.(int)$delta,
            null,
            'Hyperion\Dbal\Reports\ActionReport'
        );
    }

    /**
     * Tear down distribution
     *
     * @param int $distribution
     * @return ActionReport
     */
    public function tearDown($distribution)
    {
        return $this->call(
            'GET',
            'teardown/'.(int)$distribution,
            null,
            'Hyperion\Dbal\Reports\ActionReport'
        );
    }

    /**
     * Tear down all other distributions with the same name and environment
     *
     * @param int $distribution
     * @return MultiActionReport
     */
    public function tearDownOther($distribution)
    {
        return $this->call(
            'GET',
            'teardown-other/'.(int)$distribution,
            null,
            'Hyperion\Dbal\Reports\MultiActionReport'
        );
    }
}
 