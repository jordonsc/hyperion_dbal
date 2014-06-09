<?php
namespace Hyperion\Dbal\Tests;

use Bravo3\Properties\Conf;
use Hyperion\Dbal\DataManager;
use Hyperion\Dbal\Driver\ApiDataDriver;
use Hyperion\Dbal\Driver\ApiStackDriver;
use Hyperion\Dbal\Entity\Account;
use Hyperion\Dbal\Entity\Credential;
use Hyperion\Dbal\Entity\Project;
use Hyperion\Dbal\Enum\Packager;
use Hyperion\Dbal\Enum\Provider;
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
        $entity->setInstanceSizeProd('m1.medium');
        $entity->setInstanceSizeTest('m1.small');
        $entity->setZones(['ap-southeast-2a', 'ap-southeast-2b']);
        $entity->setFirewallsProd([]);
        $entity->setFirewallsTest([]);
        $entity->setKeysProd([]);
        $entity->setKeysTest([]);
        $entity->setTagsProd([]);
        $entity->setTagsTest([]);
        return $entity;
    }

    protected function createCredentials()
    {
        $credentials = new Credential();
        $credentials->setProvider(Provider::memberByKey(Conf::get('account.provider')));
        $credentials->setAccessKey(Conf::get('account.access_key'));
        $credentials->setSecret(Conf::get('account.secret'));
        $credentials->setRegion(Conf::get('account.region'));
        return $credentials;
    }

}
