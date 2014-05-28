<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\RepositoryType;
use JMS\Serializer\Annotation as Serializer;

class Repository extends HyperionEntity
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
    protected $url;

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

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $private_key;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $tag;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $proxy_id;

    // --

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
     * Set PrivateKey
     *
     * @param string $private_key
     * @return $this
     */
    public function setPrivateKey($private_key)
    {
        $this->private_key = $private_key;
        return $this;
    }

    /**
     * Get PrivateKey
     *
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->private_key;
    }

    /**
     * Set ProxyId
     *
     * @param int $proxy_id
     * @return $this
     */
    public function setProxyId($proxy_id)
    {
        $this->proxy_id = $proxy_id;
        return $this;
    }

    /**
     * Get ProxyId
     *
     * @return int
     */
    public function getProxyId()
    {
        return $this->proxy_id;
    }

    /**
     * Set Tag
     *
     * @param string $tag
     * @return $this
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * Get Tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set Type
     *
     * @param RepositoryType $type
     * @return $this
     */
    public function setType(RepositoryType $type)
    {
        $this->type = $type->value();
        return $this;
    }

    /**
     * Get Type
     *
     * @return RepositoryType
     */
    public function getType()
    {
        return RepositoryType::memberByValue($this->type);
    }

    /**
     * Set Url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get Url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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

    public function __toString()
    {
        return $this->getUrl();
    }

}
