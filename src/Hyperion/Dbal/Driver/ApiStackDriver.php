<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Entity\Project;

/**
 * API driver for stack management
 */
class ApiStackDriver implements StackDriverInterface
{
    use ApiDriverTrait;

    public function bake(Project $project)
    {

    }

    public function deploy(Project $project)
    {
        // TODO: Implement deploy() method.
    }

    public function scale(Project $project, $delta)
    {
        // TODO: Implement scale() method.
    }

    public function tearDown(Project $project)
    {
        // TODO: Implement tearDown() method.
    }

}
 