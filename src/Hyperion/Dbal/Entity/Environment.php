<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\DeployStrategy;
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
     * JSON array
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $load_balancers;

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
    protected $private_network;

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

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $dns_zone;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $dns_name;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $dns_ttl;


    // -- Production-specific

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $strategy;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $min_instances;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $max_instances;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $desired_capacity;

    /**
     * Time in seconds between scaling actions
     *
     * @Serializer\Type("integer")
     * @var int
     */
    protected $scale_cooldown;

    /**
     * Time in seconds between an instance being green and considered 'online'
     *
     * @Serializer\Type("integer")
     * @var int
     */
    protected $health_check_grace_period;

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

    /**
     * Set private network flag
     *
     * @param bool $is_private
     * @return $this
     */
    public function setPrivateNetwork($is_private)
    {
        $this->private_network = $is_private ? 1 : 0;
        return $this;
    }

    /**
     * Get private network flag
     *
     * @return bool
     */
    public function getPrivateNetwork()
    {
        return (bool)$this->private_network;
    }

    /**
     * Set the DNS subdomain
     *
     * @param string $dns_name
     * @return $this
     */
    public function setDnsName($dns_name)
    {
        $this->dns_name = $dns_name;
        return $this;
    }

    /**
     * Get the DNS subdomain
     *
     * @return string
     */
    public function getDnsName()
    {
        return $this->dns_name;
    }

    /**
     * Set DNS TTL in seconds
     *
     * @param string $dns_ttl
     * @return $this
     */
    public function setDnsTtl($dns_ttl)
    {
        $this->dns_ttl = $dns_ttl;
        return $this;
    }

    /**
     * Get DNS TTL in seconds
     *
     * @return int
     */
    public function getDnsTtl()
    {
        return $this->dns_ttl;
    }

    /**
     * Set the DNS zone
     *
     * @param int $dns_zone
     * @return $this
     */
    public function setDnsZone($dns_zone)
    {
        $this->dns_zone = $dns_zone;
        return $this;
    }

    /**
     * Get the DNS zone
     *
     * @return string
     */
    public function getDnsZone()
    {
        return $this->dns_zone;
    }

    /**
     * Get DesiredCapacity
     *
     * @return mixed
     */
    public function getDesiredCapacity()
    {
        return $this->desired_capacity;
    }

    /**
     * Set DesiredCapacity
     *
     * @param mixed $desired_capacity
     * @return $this
     */
    public function setDesiredCapacity($desired_capacity)
    {
        $this->desired_capacity = $desired_capacity;
        return $this;
    }

    /**
     * Get HealthCheckGracePeriod
     *
     * @return mixed
     */
    public function getHealthCheckGracePeriod()
    {
        return $this->health_check_grace_period;
    }

    /**
     * Set HealthCheckGracePeriod
     *
     * @param mixed $health_check_grace_period
     * @return $this
     */
    public function setHealthCheckGracePeriod($health_check_grace_period)
    {
        $this->health_check_grace_period = $health_check_grace_period;
        return $this;
    }

    /**
     * Get LoadBalancers
     *
     * @return string[]
     */
    public function getLoadBalancers()
    {
        return json_decode($this->load_balancers);
    }

    /**
     * Set LoadBalancers
     *
     * @param string[] $load_balancers
     * @return $this
     */
    public function setLoadBalancers(array $load_balancers)
    {
        $this->load_balancers = json_encode($load_balancers);
        return $this;
    }

    /**
     * Get MaxInstances
     *
     * @return mixed
     */
    public function getMaxInstances()
    {
        return $this->max_instances;
    }

    /**
     * Set MaxInstances
     *
     * @param mixed $max_instances
     * @return $this
     */
    public function setMaxInstances($max_instances)
    {
        $this->max_instances = $max_instances;
        return $this;
    }

    /**
     * Get MinInstances
     *
     * @return mixed
     */
    public function getMinInstances()
    {
        return $this->min_instances;
    }

    /**
     * Set MinInstances
     *
     * @param mixed $min_instances
     * @return $this
     */
    public function setMinInstances($min_instances)
    {
        $this->min_instances = $min_instances;
        return $this;
    }

    /**
     * Get ScaleCooldown
     *
     * @return mixed
     */
    public function getScaleCooldown()
    {
        return $this->scale_cooldown;
    }

    /**
     * Set ScaleCooldown
     *
     * @param mixed $scale_cooldown
     * @return $this
     */
    public function setScaleCooldown($scale_cooldown)
    {
        $this->scale_cooldown = $scale_cooldown;
        return $this;
    }

    /**
     * Get Strategy
     *
     * @return DeployStrategy
     */
    public function getStrategy()
    {
        return DeployStrategy::memberByValue($this->strategy);
    }

    /**
     * Set Strategy
     *
     * @param DeployStrategy $strategy
     * @return $this
     */
    public function setStrategy(DeployStrategy $strategy)
    {
        $this->strategy = $strategy->value();
        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
