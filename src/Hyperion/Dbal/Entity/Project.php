<?php
namespace Hyperion\ApiBundle\Entity;

use Hyperion\Dbal\Entity\HyperionEntity;

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
    protected $account_id;

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
     * @Serializer\Type("integer")
     * @var int
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
     * @var string
     */
    protected $services;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $prod_proxy_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $test_proxy_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $prod_credential_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $test_credential_id;

    // --

    /**
     * Set AccountId
     *
     * @param int $account_id
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->account_id = $account_id;
        return $this;
    }

    /**
     * Get AccountId
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->account_id;
    }

    /**
     * Set BakeStatus
     *
     * @param int $bake_status
     * @return $this
     */
    public function setBakeStatus($bake_status)
    {
        $this->bake_status = $bake_status;
        return $this;
    }

    /**
     * Get BakeStatus
     *
     * @return int
     */
    public function getBakeStatus()
    {
        return $this->bake_status;
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
     * @param int $packager
     * @return $this
     */
    public function setPackager($packager)
    {
        $this->packager = $packager;
        return $this;
    }

    /**
     * Get Packager
     *
     * @return int
     */
    public function getPackager()
    {
        return $this->packager;
    }

    /**
     * Set Packages
     *
     * @param string $packages
     * @return $this
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;
        return $this;
    }

    /**
     * Get Packages
     *
     * @return string
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set ProdCredentialId
     *
     * @param int $prod_credential_id
     * @return $this
     */
    public function setProdCredentialId($prod_credential_id)
    {
        $this->prod_credential_id = $prod_credential_id;
        return $this;
    }

    /**
     * Get ProdCredentialId
     *
     * @return int
     */
    public function getProdCredentialId()
    {
        return $this->prod_credential_id;
    }

    /**
     * Set ProdProxyId
     *
     * @param int $prod_proxy_id
     * @return $this
     */
    public function setProdProxyId($prod_proxy_id)
    {
        $this->prod_proxy_id = $prod_proxy_id;
        return $this;
    }

    /**
     * Get ProdProxyId
     *
     * @return int
     */
    public function getProdProxyId()
    {
        return $this->prod_proxy_id;
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
     * @param string $services
     * @return $this
     */
    public function setServices($services)
    {
        $this->services = $services;
        return $this;
    }

    /**
     * Get Services
     *
     * @return string
     */
    public function getServices()
    {
        return $this->services;
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
     * Set TestCredentialId
     *
     * @param int $test_credential_id
     * @return $this
     */
    public function setTestCredentialId($test_credential_id)
    {
        $this->test_credential_id = $test_credential_id;
        return $this;
    }

    /**
     * Get TestCredentialId
     *
     * @return int
     */
    public function getTestCredentialId()
    {
        return $this->test_credential_id;
    }

    /**
     * Set TestProxyId
     *
     * @param int $test_proxy_id
     * @return $this
     */
    public function setTestProxyId($test_proxy_id)
    {
        $this->test_proxy_id = $test_proxy_id;
        return $this;
    }

    /**
     * Get TestProxyId
     *
     * @return int
     */
    public function getTestProxyId()
    {
        return $this->test_proxy_id;
    }

    /**
     * Set UpdateSystemPackages
     *
     * @param int $update_system_packages
     * @return $this
     */
    public function setUpdateSystemPackages($update_system_packages)
    {
        $this->update_system_packages = $update_system_packages;
        return $this;
    }

    /**
     * Get UpdateSystemPackages
     *
     * @return int
     */
    public function getUpdateSystemPackages()
    {
        return $this->update_system_packages;
    }

}
