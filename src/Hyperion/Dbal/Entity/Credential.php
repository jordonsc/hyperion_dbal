<?php
namespace Hyperion\Dbal\Entity;

use Hyperion\Dbal\Enum\Provider;
use JMS\Serializer\Annotation as Serializer;

class Credential extends HyperionEntity
{
    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $account;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $name;

    /**
     * @Serializer\Type("integer")
     * @var int
     */
    protected $provider;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $access_key;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $secret;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $region;

    // --

    /**
     * Set access key
     *
     * @param string $key
     * @return $this
     */
    public function setAccessKey($key)
    {
        $this->access_key = $key;
        return $this;
    }

    /**
     * Get access key
     *
     * @return string
     */
    public function getAccessKey()
    {
        return $this->access_key;
    }

    /**
     * Set Region
     *
     * @param string $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->region = $region;
        return $this;
    }

    /**
     * Get Region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set Secret
     *
     * @param string $secret
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * Get Secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set Provider
     *
     * @param Provider $provider
     * @return $this
     */
    public function setProvider(Provider $provider)
    {
        $this->provider = $provider->value();
        return $this;
    }

    /**
     * Get Provider
     *
     * @return Provider
     */
    public function getProvider()
    {
        return Provider::memberByValue($this->provider);
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

    public function __toString()
    {
        return $this->getName();
    }

}
