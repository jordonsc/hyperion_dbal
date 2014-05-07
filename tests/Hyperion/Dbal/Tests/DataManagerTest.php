<?php
namespace Hyperion\Dbal\Tests;

use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDriver;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Entity;

class DataManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @small
     */
    public function testStuff()
    {
        $test_name = "Data Manager Test #".rand(100, 999);
        $test_name_mod = "Data Manager Test #".rand(100, 999).' - modified';

        $entity = new Project();
        $entity->setName($test_name);

        $manager = new DataManager(new ApiDriver());

        // CREATE
        /** @var $project Project */
        $project = $manager->create($entity);

        $this->assertGreaterThan(0, $project->getId());
        $this->assertEquals($test_name, $project->getName());

        // $entity should have been updated, and $project should be identical
        $this->assertEquals($entity->getId(), $project->getId());
        $this->assertGreaterThan(0, $entity->getId());
        $this->assertEquals($test_name, $entity->getName());

        // RETRIEVE
        /** @var $new_project Project */
        $new_project = $manager->retrieve(Entity::PROJECT(), $project->getId());

        $this->assertEquals($project->getId(), $new_project->getId());
        $this->assertEquals($project->getName(), $new_project->getName());

        // UPDATE
        $project->setName($test_name_mod);
        $manager->update($project);
        $this->assertEquals($new_project->getId(), $project->getId());

        /** @var $mod_project Project */
        $mod_project = $manager->retrieve(Entity::PROJECT(), $project->getId());

        $this->assertEquals($project->getId(), $mod_project->getId());
        $this->assertEquals($project->getName(), $mod_project->getName());

    }



}
 