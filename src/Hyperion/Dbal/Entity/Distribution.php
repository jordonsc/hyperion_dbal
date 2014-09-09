<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\DistributionStatus;
use JMS\Serializer\Annotation as Serializer;

class Distribution extends HyperionEntity
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
    protected $environment;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $version;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $tag_string;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $dns;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $status;

    // --

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
     * Set Status
     *
     * @param DistributionStatus $status
     * @return $this
     */
    public function setStatus(DistributionStatus $status)
    {
        $this->status = $status->value();
        return $this;
    }

    /**
     * Get Status
     *
     * @return DistributionStatus
     */
    public function getStatus()
    {
        return DistributionStatus::memberByValue($this->status);
    }

    /**
     * Set Environment
     *
     * @param int $environment
     * @return $this
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * Get Environment
     *
     * @return int
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Set TagString
     *
     * @param string $tag_string
     * @return $this
     */
    public function setTagString($tag_string)
    {
        $this->tag_string = $tag_string;
        return $this;
    }

    /**
     * Get TagString
     *
     * @return string
     */
    public function getTagString()
    {
        return $this->tag_string;
    }

    /**
     * Set Version
     *
     * @param int $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Get Version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set Dns
     *
     * @param string $dns
     * @return $this
     */
    public function setDns($dns)
    {
        $this->dns = $dns;
        return $this;
    }

    /**
     * Get Dns
     *
     * @return string
     */
    public function getDns()
    {
        return $this->dns;
    }

}
