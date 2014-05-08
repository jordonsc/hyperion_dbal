<?php
namespace Hyperion\Dbal\Criteria;

use Hyperion\Dbal\Enum\Comparison;
use JMS\Serializer\Annotation as Serializer;

class Criteria
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $field;

    /**
     * @var mixed
     * @Serializer\Type("string")
     */
    protected $value;

    /**
     * @var Comparison
     * @Serializer\Type("string")
     * @Serializer\Accessor(getter="_serialiseComparison", setter="_deserialiseComparison")
     */
    protected $comparison;

    /**
     * Create a new criteria
     *
     * @param string     $field
     * @param mixed      $value
     * @param Comparison $comparison
     */
    function __construct($field, $value, Comparison $comparison = null)
    {
        $this->field      = $field;
        $this->value      = $value;
        $this->comparison = $comparison ? : Comparison::EQUALS();
    }

    /**
     * Get Field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Get Value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get Comparison
     *
     * @return Comparison
     */
    public function getComparison()
    {
        return $this->comparison;
    }

    /**
     * For serialisation only
     *
     * @ignore
     */
    public function _serialiseComparison()
    {
        return $this->comparison->value();
    }

    /**
     * For deserialisation only
     *
     * @ignore
     */
    public function _deserialiseComparison($value)
    {
        $this->comparison = Comparison::memberByValue($value);
    }


} 