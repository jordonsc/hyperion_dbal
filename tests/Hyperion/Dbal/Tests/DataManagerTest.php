<?php
namespace Hyperion\Dbal\Tests;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDriver;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Comparison;
use Hyperion\Dbal\Enum\Entity;
use Hyperion\Dbal\Enum\Packager;

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
        $test_name     = "Data Manager Test #".rand(100, 999);
        $test_name_mod = "Data Manager Test #".rand(100, 999).' - modified';
        $manager       = $this->getManager();
        $entity        = $this->createProject($test_name);

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

        // RETRIEVE ALL
        $projects = $manager->retrieveAll(Entity::PROJECT());
        $this->assertGreaterThan(0, $projects->count());

        // DELETE
        foreach ($projects as $item) {
            $manager->delete($item);
        }

        $projects = $manager->retrieveAll(Entity::PROJECT());
        $this->assertEquals(0, $projects->count());

    }

    /**
     * @medium
     */
    public function testCriteria()
    {
        $name_a = "Criteria Test A ".rand(100, 999);
        $name_b = "Criteria Test B ".rand(100, 999);

        $project_a = $this->createProject($name_a);
        $project_b = $this->createProject($name_b);

        $manager = $this->getManager();
        $manager->create($project_a);
        $manager->create($project_b);

        $projects = $manager->search(
            Entity::PROJECT(),
            CriteriaCollection::build()->add('name', 'Criteria Test A%', Comparison::LIKE())
        );

        $this->assertEquals(1, $projects->count());

        /** @var Project $project */
        $project = $projects->current();

        $this->assertTrue($project instanceof Project);

        $this->assertEquals($name_a, $project->getName());
        $this->assertEquals($project_a->getId(), $project->getId());

    }

    /**
     * Create a new sample Project
     *
     * @param string $name
     * @return Project
     */
    protected function createProject($name)
    {
        $entity = new Project();
        $entity->setName($name);
        $entity->setSourceImageId('i-fake');
        $entity->setPackager(Packager::YUM());
        $entity->setUpdateSystemPackages(true);
        $entity->setPackages(['httpd', 'php']);
        $entity->setServices(['httpd']);
        return $entity;
    }

}
 