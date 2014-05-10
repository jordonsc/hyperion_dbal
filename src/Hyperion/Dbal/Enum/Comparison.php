<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static Comparison EQUALS()
 * @method static Comparison NOT_EQUALS()
 * @method static Comparison LIKE()
 * @method static Comparison NOT_LIKE()
 * @method static Comparison GT()
 * @method static Comparison GTE()
 * @method static Comparison LT()
 * @method static Comparison LTE()
 */
class Comparison extends AbstractEnumeration
{
    const EQUALS      = '=';
    const NOT_EQUALS  = '!=';
    const LIKE        = 'LIKE';
    const NOT_LIKE    = 'NOT LIKE';
    const GT          = '>';
    const GTE         = '>=';
    const LT          = '<';
    const LTE         = '<=';
}