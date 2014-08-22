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
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $zones;

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

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $ssh_port;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $ssh_user;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $ssh_password;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $ssh_pkey;

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
     * Set the zones/subnets this application will deploy in
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
     * Get the zones/subnets this application will deploy in
     *
     * @return string[]
     */
    public function getZones()
    {
        return json_decode($this->zones);
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

    /**
     * Set SshPassword
     *
     * @param string $ssh_password
     * @return $this
     */
    public function setSshPassword($ssh_password)
    {
        $this->ssh_password = $ssh_password;
        return $this;
    }

    /**
     * Get SshPassword
     *
     * @return string
     */
    public function getSshPassword()
    {
        return $this->ssh_password;
    }

    /**
     * Set SshPkey
     *
     * @param string $ssh_pkey
     * @return $this
     */
    public function setSshPkey($ssh_pkey)
    {
        $this->ssh_pkey = $ssh_pkey;
        return $this;
    }

    /**
     * Get SshPkey
     *
     * @return string
     */
    public function getSshPkey()
    {
        return $this->ssh_pkey;
    }

    /**
     * Set SshPort
     *
     * @param int $ssh_port
     * @return $this
     */
    public function setSshPort($ssh_port)
    {
        $this->ssh_port = $ssh_port;
        return $this;
    }

    /**
     * Get SshPort
     *
     * @return int
     */
    public function getSshPort()
    {
        return $this->ssh_port;
    }

    /**
     * Set SshUser
     *
     * @param string $ssh_user
     * @return $this
     */
    public function setSshUser($ssh_user)
    {
        $this->ssh_user = $ssh_user;
        return $this;
    }

    /**
     * Get SshUser
     *
     * @return string
     */
    public function getSshUser()
    {
        return $this->ssh_user;
    }


    public function __toString()
    {
        return $this->getName();
    }

}
