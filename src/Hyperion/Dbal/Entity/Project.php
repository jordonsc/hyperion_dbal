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
     * @Serializer\Type("string")
     * @var string
     */
    protected $script;

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
     * Set BakeStatus
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
     * Get BakeStatus
     *
     * @return BakeStatus
     */
    public function getBakeStatus()
    {
        return BakeStatus::memberByValue($this->bake_status);
    }

    /**
     * Set BakedImageId
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
     * Get BakedImageId
     *
     * @return string
     */
    public function getBakedImageId()
    {
        return $this->baked_image_id;
    }

    /**
     * Set Name
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
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Packager
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
     * Get Packager
     *
     * @return Packager
     */
    public function getPackager()
    {
        return Packager::memberByValue($this->packager);
    }

    /**
     * Set Packages
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
     * Get Packages
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
     * Set Services
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
     * Get Services
     *
     * @return string[]
     */
    public function getServices()
    {
        return json_decode($this->services);
    }

    /**
     * Set SourceImageId
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
     * Get SourceImageId
     *
     * @return int
     */
    public function getSourceImageId()
    {
        return $this->source_image_id;
    }

    /**
     * Set UpdateSystemPackages
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
     * Get UpdateSystemPackages
     *
     * @return bool
     */
    public function getUpdateSystemPackages()
    {
        return $this->update_system_packages == 1;
    }

    /**
     * Set Account
     *
     * @param int $account
     * @return $this
     */
    public function setAccount($account)
    {
        if (is_string($account)) {
            $obj = json_decode($account);
            $account = $obj->id;
        }

        $this->account = $account;
        return $this;
    }

    public function setAccountId($account)
    {
        return $this->setAccount($account);
    }

    /**
     * Get Account
     *
     * @return int
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set ProdCredential
     *
     * @param Credential $prod_credential
     * @return $this
     */
    public function setProdCredential($prod_credential)
    {
        $this->prod_credential = $prod_credential;
        return $this;
    }

    /**
     * Get ProdCredential
     *
     * @return Credential
     */
    public function getProdCredential()
    {
        return $this->prod_credential;
    }

    /**
     * Set ProdProxy
     *
     * @param Proxy $prod_proxy
     * @return $this
     */
    public function setProdProxy($prod_proxy)
    {
        $this->prod_proxy = $prod_proxy;
        return $this;
    }

    /**
     * Get ProdProxy
     *
     * @return Proxy
     */
    public function getProdProxy()
    {
        return $this->prod_proxy;
    }

    /**
     * Set TestCredential
     *
     * @param Credential $test_credential
     * @return $this
     */
    public function setTestCredential($test_credential)
    {
        $this->test_credential = $test_credential;
        return $this;
    }

    /**
     * Get TestCredential
     *
     * @return Credential
     */
    public function getTestCredential()
    {
        return $this->test_credential;
    }

    /**
     * Set TestProxy
     *
     * @param Proxy $test_proxy
     * @return $this
     */
    public function setTestProxy($test_proxy)
    {
        $this->test_proxy = $test_proxy;
        return $this;
    }

    /**
     * Get TestProxy
     *
     * @return Proxy
     */
    public function getTestProxy()
    {
        return $this->test_proxy;
    }

}
