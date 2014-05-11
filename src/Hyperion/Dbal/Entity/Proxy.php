<?php
namespace Hyperion\ApiBundle\Entity;

use Hyperion\Dbal\Entity\HyperionEntity;

class Proxy extends HyperionEntity
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $account_id;

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
     * @param int $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get Type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
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

}
