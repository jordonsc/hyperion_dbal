<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\BakeStatus;
use Hyperion\Dbal\Enum\Packager;
use JMS\Serializer\Annotation as Serializer;

class Project extends HyperionEntity
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $account;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $bake_status;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $baked_image_id;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $source_image_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $packager;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $update_system_packages;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $packages;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $zones;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $instance_size_prod;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $instance_size_test;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $network_prod;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $network_test;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $keys_prod;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $keys_test;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $firewalls_prod;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $firewalls_test;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $tags_prod;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $tags_test;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $script;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $tenancy;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $services;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $prod_proxy;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $test_proxy;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $prod_credential;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $test_credential;

    // --

    function __construct()
    {
        $this->setBakeStatus(BakeStatus::UNBAKED());
        $this->setPackages([]);
        $this->setServices([]);
    }

    /**
     * Set if this application has been baked
     *
     * @param BakeStatus $bake_status
     * @return $this
     */
    public function setBakeStatus(BakeStatus $bake_status)
    {
        $this->bake_status = $bake_status->value();
        return $this;
    }

    /**
     * Check if this application has been baked
     *
     * @return BakeStatus
     */
    public function getBakeStatus()
    {
        return BakeStatus::memberByValue($this->bake_status);
    }

    /**
     * Set the ID of the baked image
     *
     * @param string $baked_image_id
     * @return $this
     */
    public function setBakedImageId($baked_image_id)
    {
        $this->baked_image_id = $baked_image_id;
        return $this;
    }

    /**
     * Get the ID of the baked image
     *
     * @return string
     */
    public function getBakedImageId()
    {
        return $this->baked_image_id;
    }

    /**
     * Set the project name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the project name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the packager type (apt, yum)
     *
     * @param Packager $packager
     * @return $this
     */
    public function setPackager(Packager $packager)
    {
        $this->packager = $packager->value();
        return $this;
    }

    /**
     * Get the packager type (apt, yum)
     *
     * @return Packager
     */
    public function getPackager()
    {
        return Packager::memberByValue($this->packager);
    }

    /**
     * Set system packages to be installed
     *
     * @param string[] $packages
     * @return $this
     */
    public function setPackages(array $packages)
    {
        $this->packages = json_encode($packages);
        return $this;
    }

    /**
     * Get system packages to be installed
     *
     * @return string[]
     */
    public function getPackages()
    {
        return json_decode($this->packages);
    }

    /**
     * Set Script
     *
     * @param string $script
     * @return $this
     */
    public function setScript($script)
    {
        $this->script = $script;
        return $this;
    }

    /**
     * Get Script
     *
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set system services to be launched
     *
     * @param string[] $services
     * @return $this
     */
    public function setServices(array $services)
    {
        $this->services = json_encode($services);
        return $this;
    }

    /**
     * Get system services to be launched
     *
     * @return string[]
     */
    public function getServices()
    {
        return json_decode($this->services);
    }

    /**
     * Set the machine image ID the bakery should start with
     *
     * @param int $source_image_id
     * @return $this
     */
    public function setSourceImageId($source_image_id)
    {
        $this->source_image_id = $source_image_id;
        return $this;
    }

    /**
     * Get the machine image ID the bakery should start with
     *
     * @return int
     */
    public function getSourceImageId()
    {
        return $this->source_image_id;
    }

    /**
     * Set if all installed system packages should be updated during baking
     *
     * @param bool $update_system_packages
     * @return $this
     */
    public function setUpdateSystemPackages($update_system_packages)
    {
        $this->update_system_packages = $update_system_packages ? 1 : 0;
        return $this;
    }

    /**
     * Check if all installed system packages should be updated during baking
     *
     * @return bool
     */
    public function getUpdateSystemPackages()
    {
        return $this->update_system_packages == 1;
    }

    /**
     * Set the account ID
     *
     * @param int $account
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * Get the account ID
     *
     * @return int
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set the production credential ID
     *
     * @param int $prod_credential
     * @return $this
     */
    public function setProdCredential($prod_credential)
    {
        $this->prod_credential = $prod_credential;
        return $this;
    }

    /**
     * Get the production credential ID
     *
     * @return int
     */
    public function getProdCredential()
    {
        return $this->prod_credential;
    }

    /**
     * Set the production proxy ID
     *
     * @param int $prod_proxy
     * @return $this
     */
    public function setProdProxy($prod_proxy)
    {
        $this->prod_proxy = $prod_proxy;
        return $this;
    }

    /**
     * Get the production proxy ID
     *
     * @return int
     */
    public function getProdProxy()
    {
        return $this->prod_proxy;
    }

    /**
     * Set the test credential ID
     *
     * @param int $test_credential
     * @return $this
     */
    public function setTestCredential($test_credential)
    {
        $this->test_credential = $test_credential;
        return $this;
    }

    /**
     * Get the test credential ID
     *
     * @return int
     */
    public function getTestCredential()
    {
        return $this->test_credential;
    }

    /**
     * Set the test proxy ID
     *
     * @param int $test_proxy
     * @return $this
     */
    public function setTestProxy($test_proxy)
    {
        $this->test_proxy = $test_proxy;
        return $this;
    }

    /**
     * Get the test proxy ID
     *
     * @return int
     */
    public function getTestProxy()
    {
        return $this->test_proxy;
    }

    /**
     * Set the instance size for production environments
     *
     * @param string $instance_size_prod
     * @return $this
     */
    public function setInstanceSizeProd($instance_size_prod)
    {
        $this->instance_size_prod = $instance_size_prod;
        return $this;
    }

    /**
     * Get the instance size for production environments
     *
     * @return string
     */
    public function getInstanceSizeProd()
    {
        return $this->instance_size_prod;
    }

    /**
     * Set the instance size for test environments
     *
     * @param string $instance_size_test
     * @return $this
     */
    public function setInstanceSizeTest($instance_size_test)
    {
        $this->instance_size_test = $instance_size_test;
        return $this;
    }

    /**
     * Get the instance size for test environments
     *
     * @return string
     */
    public function getInstanceSizeTest()
    {
        return $this->instance_size_test;
    }

    /**
     * Set the zones this application will deploy in
     *
     * @param string[] $zones
     * @return $this
     */
    public function setZones($zones)
    {
        $this->zones = json_encode($zones);
        return $this;
    }

    /**
     * Get the zones this application will deploy in
     *
     * @return string[]
     */
    public function getZones()
    {
        return json_decode($this->zones);
    }

    /**
     * Set FirewallsProd
     *
     * @param string[] $firewalls_prod
     * @return $this
     */
    public function setFirewallsProd($firewalls_prod)
    {
        $this->firewalls_prod = json_encode($firewalls_prod);
        return $this;
    }

    /**
     * Get FirewallsProd
     *
     * @return string[]
     */
    public function getFirewallsProd()
    {
        return json_decode($this->firewalls_prod);
    }

    /**
     * Set FirewallsTest
     *
     * @param string[] $firewalls_test
     * @return $this
     */
    public function setFirewallsTest($firewalls_test)
    {
        $this->firewalls_test = json_encode($firewalls_test);
        return $this;
    }

    /**
     * Get FirewallsTest
     *
     * @return string[]
     */
    public function getFirewallsTest()
    {
        return json_decode($this->firewalls_test);
    }

    /**
     * Set production keys
     *
     * @param string[] $keys_prod
     * @return $this
     */
    public function setKeysProd($keys_prod)
    {
        $this->keys_prod = json_encode($keys_prod);
        return $this;
    }

    /**
     * Get production keys
     *
     * @return string[]
     */
    public function getKeysProd()
    {
        return json_decode($this->keys_prod);
    }

    /**
     * Set test keys
     *
     * @param string[] $keys_test
     * @return $this
     */
    public function setKeysTest($keys_test)
    {
        $this->keys_test = json_encode($keys_test);
        return $this;
    }

    /**
     * Get test keys
     *
     * @return string[]
     */
    public function getKeysTest()
    {
        return json_decode($this->keys_test);
    }

    /**
     * Set NetworkProd
     *
     * @param string $network_prod
     * @return $this
     */
    public function setNetworkProd($network_prod)
    {
        $this->network_prod = $network_prod;
        return $this;
    }

    /**
     * Get NetworkProd
     *
     * @return string
     */
    public function getNetworkProd()
    {
        return $this->network_prod;
    }

    /**
     * Set NetworkTest
     *
     * @param string $network_test
     * @return $this
     */
    public function setNetworkTest($network_test)
    {
        $this->network_test = $network_test;
        return $this;
    }

    /**
     * Get NetworkTest
     *
     * @return string
     */
    public function getNetworkTest()
    {
        return $this->network_test;
    }

    /**
     * Set tags for the production environment
     *
     * @param string[] $tags_prod
     * @return $this
     */
    public function setTagsProd($tags_prod)
    {
        $this->tags_prod = json_encode($tags_prod);
        return $this;
    }

    /**
     * Get tags for the production environment
     *
     * @return string[]
     */
    public function getTagsProd()
    {
        return json_decode($this->tags_prod, true);
    }

    /**
     * Set tags for the test environment
     *
     * @param string[] $tags_test
     * @return $this
     */
    public function setTagsTest($tags_test)
    {
        $this->tags_test = json_encode($tags_test);
        return $this;
    }

    /**
     * Get tags for the test environment
     *
     * @return string[]
     */
    public function getTagsTest()
    {
        return json_decode($this->tags_test, true);
    }

    /**
     * Set tenancy (eg VPC)
     *
     * @param string $tenancy
     * @return $this
     */
    public function setTenancy($tenancy)
    {
        $this->tenancy = $tenancy;
        return $this;
    }

    /**
     * Get tenancy (eg VPC)
     *
     * @return string
     */
    public function getTenancy()
    {
        return $this->tenancy;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
