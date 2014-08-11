<?php
namespace Hyperion\Dbal\Tests;

use Hyperion\Dbal\Collection\CriteriaCollection;
use Hyperion\Dbal\Entity\Account;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Entity\Repository;
use Hyperion\Dbal\Enum\Comparison;
use Hyperion\Dbal\Enum\Entity;

class RelationshipTest extends TestBase
{

    /**
     * @medium
     */
    public function testRelationships()
    {
        $test_name     = "Data Manager Relationship Test #".rand(100, 999);
        $manager       = $this->getDataManager();

        $account = $this->createAccount($test_name." - Account");
        $manager->create($account);

        $project = $this->createProject($test_name." - Project");
        $project->setAccount($account->getId());
        $manager->create($project);

        $repo1 = $this->createRepository($test_name." - Repo #1");
        $repo1->setAccount($account->getId());
        $manager->create($repo1);

        $repo2 = $this->createRepository($test_name." - Repo #2");
        $repo2->setAccount($account->getId());
        $manager->create($repo2);

        $manager->addRelationship($project, $repo1);

        $repos = $manager->getRelatedEntities($project, Entity::REPOSITORY());
        $this->assertEquals(1, $repos->count());

        /** @var Repository $repo */
        $repo = $repos->current();
        $this->assertEquals($repo1->getName(), $repo->getName());

        $manager->addRelationship($project, $repo2);

        $repos = $manager->getRelatedEntities($project, Entity::REPOSITORY());
        $this->assertEquals(2, $repos->count());

        $manager->removeRelationship($project, $repo1);

        $repos = $manager->getRelatedEntities($project, Entity::REPOSITORY());
        $this->assertEquals(1, $repos->count());

        /** @var Repository $repo */
        $repo = $repos->current();
        $this->assertEquals($repo2->getName(), $repo->getName());

        $manager->delete($project);
        $manager->delete($repo1);
        $manager->delete($repo2);
        $manager->delete($account);
    }


}
 