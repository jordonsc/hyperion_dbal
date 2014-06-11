<?php
namespace Hyperion\Dbal\Tests;

class DeployTest extends TestBase
{

    /**
     * @medium
     */
    public function testDeploy()
    {
        $manager = $this->getDataManager();

        $account = $this->createAccount('Deploy Test Account');
        $project = $this->createProject('Deploy Test Project');
        $creds   = $this->createCredentials();

        $manager->create($account);
        $project->setAccount($account->getId());
        $creds->setAccount($account->getId());

        $manager->create($creds);
        $manager->create($project);


    }


}
 