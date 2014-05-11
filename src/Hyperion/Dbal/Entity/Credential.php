<?php
namespace Hyperion\Dbal\Entity;

use JMS\Serializer\Annotation as Serializer;

class Credential extends HyperionEntity
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
    protected $provider_id;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    protected $key;

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
     * Set Key
     *
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Get Key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set ProviderId
     *
     * @param int $provider_id
     * @return $this
     */
    public function setProviderId($provider_id)
    {
        $this->provider_id = $provider_id;
        return $this;
    }

    /**
     * Get ProviderId
     *
     * @return int
     */
    public function getProviderId()
    {
        return $this->provider_id;
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

}
