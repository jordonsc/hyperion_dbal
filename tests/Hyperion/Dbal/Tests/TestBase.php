<?php
namespace Hyperion\Dbal\Tests;

use Bravo3\Properties\Conf;
use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDataDriver;
use Hyperion\Dbal\Driver\ApiStackDriver;
use Hyperion\Dbal\Entity\Account;
use Hyperion\Dbal\Entity\Credential;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Entity\Repository;
use Hyperion\Dbal\Enum\Packager;
use Hyperion\Dbal\Enum\Provider;
use Hyperion\Dbal\Enum\RepositoryType;
use Hyperion\Dbal\StackManager;

/**
 * Common functions for integration testing
 */
abstract class TestBase extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        Conf::init(__DIR__.'/../../../');
    }

    protected function getDataManager()
    {
        return new DataManager(new ApiDataDriver());
    }

    protected function getStackManager()
    {
        return new StackManager(new ApiStackDriver());
    }

    /**
     * Create a new sample Account
     *
     * @param string $name
     * @return Account
     */
    protected function createAccount($name)
    {
        $entity = new Account();
        $entity->setName($name);
        return $entity;
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
        $entity->setSourceImageId('ami-fb8e9292');
        $entity->setPackager(Packager::YUM());
        $entity->setUpdateSystemPackages(true);
        $entity->setPackages(['httpd', 'php']);
        $entity->setServices(['httpd']);
        return $entity;
    }

    /**
     * Sample credentials
     *
     * @param string $name
     * @return Credential
     */
    protected function createCredentials($name)
    {
        $credentials = new Credential();
        $credentials->setName($name);
        $credentials->setProvider(Provider::memberByKey(Conf::get('account.provider')));
        $credentials->setAccessKey(Conf::get('account.access_key'));
        $credentials->setSecret(Conf::get('account.secret'));
        $credentials->setRegion(Conf::get('account.region'));
        return $credentials;
    }

    /**
     * Sample repository
     *
     * @param string $name
     * @return Repository
     */
    protected function createRepository($name)
    {
        $repo = new Repository();
        $repo->setName($name);
        $repo->setType(RepositoryType::GIT());
        $repo->setUrl("ssh://git@github.com:something.git");
        $repo->setCheckoutDirectory('/tmp/something');
        return $repo;
    }

}
