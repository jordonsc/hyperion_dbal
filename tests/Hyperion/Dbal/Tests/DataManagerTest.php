<?php
namespace Hyperion\Dbal\Tests;

use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDriver;
use Hyperion\Dbal\Entity\Project;

class DataManagerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @small
     */
    public function testStuff()
    {
        $test_name = "Data Manager Test #".rand(100, 999);
        $entity = new Project();
        $entity->setName($test_name);

        $manager = new DataManager(new ApiDriver());

        /** @var $project Project */
        $project = $manager->create($entity);

        $this->assertGreaterThan(0, $project->getId());
        $this->assertEquals($test_name, $project->getName());

    }



}
 