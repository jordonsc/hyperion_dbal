<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static ActionType DEPLOY()
 * @method static ActionType SCALE()
 * @method static ActionType TEAR_DOWN()
 */
final class ActionType extends AbstractEnumeration
{
    const DEPLOY    = 0;
    const SCALE     = 1;
    const TEAR_DOWN = 2;
}
 