<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\ProxyType;
use JMS\Serializer\Annotation as Serializer;

class Proxy extends HyperionEntity
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $account;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $type;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $hostname;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $port;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $username;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $password;

    // --

    /**
     * Set Hostname
     *
     * @param string $hostname
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * Get Hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Set Password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set Port
     *
     * @param int $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = $port;
        return $this;
    }

    /**
     * Get Port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Set Type
     *
     * @param ProxyType $type
     * @return $this
     */
    public function setType(ProxyType $type)
    {
        $this->type = $type->value();
        return $this;
    }

    /**
     * Get Type
     *
     * @return ProxyType
     */
    public function getType()
    {
        return ProxyType::memberByValue($this->type);
    }

    /**
     * Set Username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get Username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set Account
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
     * Get Account
     *
     * @return int
     */
    public function getAccount()
    {
        return $this->account;
    }

    public function __toString()
    {
        return $this->getHostname().":".$this->getPort();
    }

}
