<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\InstanceState;
use JMS\Serializer\Annotation as Serializer;

class Instance extends HyperionEntity
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $instance_id;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $distribution;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $private_dns;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $private_ip4;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $private_ip6;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $public_dns;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $public_ip4;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $public_ip6;

    // --

    /**
     * Set Distribution
     *
     * @param int $distribution
     * @return $this
     */
    public function setDistribution($distribution)
    {
        $this->distribution = $distribution;
        return $this;
    }

    /**
     * Get Distribution
     *
     * @return int
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Set InstanceId
     *
     * @param string $instance_id
     * @return $this
     */
    public function setInstanceId($instance_id)
    {
        $this->instance_id = $instance_id;
        return $this;
    }

    /**
     * Get InstanceId
     *
     * @return string
     */
    public function getInstanceId()
    {
        return $this->instance_id;
    }

    /**
     * Set PrivateDns
     *
     * @param mixed $private_dns
     * @return $this
     */
    public function setPrivateDns($private_dns)
    {
        $this->private_dns = $private_dns;
        return $this;
    }

    /**
     * Get PrivateDns
     *
     * @return mixed
     */
    public function getPrivateDns()
    {
        return $this->private_dns;
    }

    /**
     * Set PrivateIp4
     *
     * @param mixed $private_ip4
     * @return $this
     */
    public function setPrivateIp4($private_ip4)
    {
        $this->private_ip4 = $private_ip4;
        return $this;
    }

    /**
     * Get PrivateIp4
     *
     * @return mixed
     */
    public function getPrivateIp4()
    {
        return $this->private_ip4;
    }

    /**
     * Set PrivateIp6
     *
     * @param mixed $private_ip6
     * @return $this
     */
    public function setPrivateIp6($private_ip6)
    {
        $this->private_ip6 = $private_ip6;
        return $this;
    }

    /**
     * Get PrivateIp6
     *
     * @return mixed
     */
    public function getPrivateIp6()
    {
        return $this->private_ip6;
    }

    /**
     * Set PublicDns
     *
     * @param mixed $public_dns
     * @return $this
     */
    public function setPublicDns($public_dns)
    {
        $this->public_dns = $public_dns;
        return $this;
    }

    /**
     * Get PublicDns
     *
     * @return mixed
     */
    public function getPublicDns()
    {
        return $this->public_dns;
    }

    /**
     * Set PublicIp4
     *
     * @param mixed $public_ip4
     * @return $this
     */
    public function setPublicIp4($public_ip4)
    {
        $this->public_ip4 = $public_ip4;
        return $this;
    }

    /**
     * Get PublicIp4
     *
     * @return mixed
     */
    public function getPublicIp4()
    {
        return $this->public_ip4;
    }

    /**
     * Set PublicIp6
     *
     * @param mixed $public_ip6
     * @return $this
     */
    public function setPublicIp6($public_ip6)
    {
        $this->public_ip6 = $public_ip6;
        return $this;
    }

    /**
     * Get PublicIp6
     *
     * @return mixed
     */
    public function getPublicIp6()
    {
        return $this->public_ip6;
    }

    public function __toString()
    {
        return $this->getInstanceId();
    }

}
