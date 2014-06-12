<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\EnvironmentType;
use Hyperion\Dbal\Enum\Tenancy;
use JMS\Serializer\Annotation as Serializer;

class Environment extends HyperionEntity
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
    protected $environment_type;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $project;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $credential;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $instance_size;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $network;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $key_pairs;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $firewalls;

    /**
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $tags;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $tenancy;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $proxy;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $script;

    // --


    /**
     * Set Credential
     *
     * @param int $credential
     * @return $this
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
        return $this;
    }

    /**
     * Get Credential
     *
     * @return int
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Set EnvironmentType
     *
     * @param EnvironmentType $environment_type
     * @return $this
     */
    public function setEnvironmentType(EnvironmentType $environment_type)
    {
        $this->environment_type = $environment_type->value();
        return $this;
    }

    /**
     * Get EnvironmentType
     *
     * @return EnvironmentType
     */
    public function getEnvironmentType()
    {
        return EnvironmentType::memberByValue($this->environment_type);
    }

    /**
     * Set Firewalls
     *
     * @param string[] $firewalls
     * @return $this
     */
    public function setFirewalls(array $firewalls)
    {
        $this->firewalls = json_encode($firewalls);
        return $this;
    }

    /**
     * Get Firewalls
     *
     * @return string[]
     */
    public function getFirewalls()
    {
        return json_decode($this->firewalls);
    }

    /**
     * Set InstanceSize
     *
     * @param string $instance_size
     * @return $this
     */
    public function setInstanceSize($instance_size)
    {
        $this->instance_size = $instance_size;
        return $this;
    }

    /**
     * Get InstanceSize
     *
     * @return string
     */
    public function getInstanceSize()
    {
        return $this->instance_size;
    }

    /**
     * Set key pairs
     *
     * @param string[] $key_pairs
     * @return $this
     */
    public function setKeyPairs(array $key_pairs)
    {
        $this->key_pairs = json_encode($key_pairs);
        return $this;
    }

    /**
     * Get key pairs
     *
     * @return string[]
     */
    public function getKeyPairs()
    {
        return json_decode($this->key_pairs);
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
     * Set Network
     *
     * @param string $network
     * @return $this
     */
    public function setNetwork($network)
    {
        $this->network = $network;
        return $this;
    }

    /**
     * Get Network
     *
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set Project
     *
     * @param int $project
     * @return $this
     */
    public function setProject($project)
    {
        $this->project = $project;
        return $this;
    }

    /**
     * Get Project
     *
     * @return int
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set Proxy
     *
     * @param int $proxy
     * @return $this
     */
    public function setProxy($proxy)
    {
        $this->proxy = $proxy;
        return $this;
    }

    /**
     * Get Proxy
     *
     * @return int
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * Set Tags
     *
     * @param string[] $tags Associative array of tag names
     * @return $this
     */
    public function setTags(array $tags)
    {
        $this->tags = json_encode($tags);
        return $this;
    }

    /**
     * Get Tags
     *
     * @return string[] Associative array of tag names
     */
    public function getTags()
    {
        return json_decode($this->tags, true);
    }

    /**
     * Set Tenancy
     *
     * @param Tenancy $tenancy
     * @return $this
     */
    public function setTenancy(Tenancy $tenancy)
    {
        $this->tenancy = $tenancy->value();
        return $this;
    }

    /**
     * Get Tenancy
     *
     * @return Tenancy
     */
    public function getTenancy()
    {
        return Tenancy::memberByValue($this->tenancy);
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

    public function __toString()
    {
        return $this->getName();
    }

}
