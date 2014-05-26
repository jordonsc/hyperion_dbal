<?php
namespace Hyperion\Dbal\Driver;

use Hyperion\Dbal\Entity\Project;

interface StackDriverInterface
{
    public function bake(Project $project);

    public function deploy(Project $project);

    public function scale(Project $project, $delta);

    public function tearDown(Project $project);

    // TODO: add some status getters
}