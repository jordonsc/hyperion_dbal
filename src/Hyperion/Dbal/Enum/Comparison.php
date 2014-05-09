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
 * @method static Comparison NULL()
 * @method static Comparison NOT_NULL()
 * @method static Comparison BETWEEN()
 * @method static Comparison NOT_BETWEEN()
 * @method static Comparison IN()
 * @method static Comparison NOT_IN()
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
    const NULL        = 'IS NULL';
    const NOT_NULL    = 'IS NOT NULL';
    const BETWEEN     = 'BETWEEN';
    const NOT_BETWEEN = 'NOT BETWEEN';
    const IN          = 'IN';
    const NOT_IN      = 'NOT IN';
}