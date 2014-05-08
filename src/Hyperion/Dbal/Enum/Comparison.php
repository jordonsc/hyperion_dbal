<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static Comparison EQUALS()
 * @method static Comparison NOT_EQUALS()
 * @method static Comparison LIKE()
 * @method static Comparison GT()
 * @method static Comparison GTE()
 * @method static Comparison LT()
 * @method static Comparison LTE()
 * @method static Comparison NULL()
 * @method static Comparison NOT_NULL()
 */
class Comparison extends AbstractEnumeration
{
    const EQUALS     = 'eq';
    const NOT_EQUALS = 'neq';
    const LIKE       = 'like';
    const GT         = 'gt';
    const GTE        = 'gte';
    const LT         = 'lt';
    const LTE        = 'lte';
    const NULL       = 'null';
    const NOT_NULL   = 'not_null';
}