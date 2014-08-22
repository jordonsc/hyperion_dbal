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
    protected $bake_script;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $launch_script;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $services;

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
    public function setBakeScript($script)
    {
        $this->bake_script = $script;
        return $this;
    }

    /**
     * Get Script
     *
     * @return string
     */
    public function getBakeScript()
    {
        return $this->bake_script;
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
     * Set LaunchScript
     *
     * @param string $launch_script
     * @return $this
     */
    public function setLaunchScript($launch_script)
    {
        $this->launch_script = $launch_script;
        return $this;
    }

    /**
     * Get LaunchScript
     *
     * @return string
     */
    public function getLaunchScript()
    {
        return $this->launch_script;
    }

    public function __toString()
    {
        return $this->getName();
    }

}
