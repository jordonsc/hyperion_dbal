<?php
namespace Hyperion\Dbal\Tests;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDriver;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Comparison;
use Hyperion\Dbal\Enum\Entity;

class DataManagerTest extends \PHPUnit_Framework_TestCase
{

    protected function getManager()
    {
        return new DataManager(new ApiDriver());
    }

    /**
     * @medium
     */
    public function testCrud()
    {
        $test_name = "Data Manager Test #".rand(100, 999);
        $test_name_mod = "Data Manager Test #".rand(100, 999).' - modified';

        $entity = new Project();
        $entity->setName($test_name);

        $manager = $this->getManager();

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

        // SEARCH (ALL)
        $projects = $manager->search(Entity::PROJECT());
        $this->assertGreaterThan(0, $projects->count());

        // DELETE
        foreach ($projects as $item) {
            $manager->delete($item);
        }

        $projects = $manager->search(Entity::PROJECT());
        $this->assertEquals(0, $projects->count());

    }

    /**
     * @medium
     */
    public function testCriteria()
    {
        $name_a = "Criteria Test A ".rand(100, 999);
        $name_b = "Criteria Test B ".rand(100, 999);

        $project_a = new Project();
        $project_a->setName($name_a);

        $project_b = new Project();
        $project_b->setName($name_b);

        $manager = $this->getManager();
        $manager->create($project_a);
        $manager->create($project_b);

        $projects = $manager->search(
            Entity::PROJECT(),
            CriteriaCollection::build()->add('name', 'Criteria Test A%', Comparison::LIKE())
        );

        $this->assertEquals(1, $projects->count());

        /** @var Project $project */
        $project = $projects[0];

        $this->assertTrue($project instanceof Project);

        $this->assertEquals($name_a, $project->getName());
        $this->assertEquals($project_a->getId(), $project->getId());

    }


}
 