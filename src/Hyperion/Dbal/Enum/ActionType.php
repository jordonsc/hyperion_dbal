<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static ActionType SCALE()
 * @method static ActionType TEAR_DOWN()
 * @method static ActionType BAKE()
 * @method static ActionType BUILD()
 * @method static ActionType DEPLOY_ASG()
 * @method static ActionType DEPLOY_MANAGED()
 */
final class ActionType extends AbstractEnumeration
{
    const SCALE = 1;
    const TEAR_DOWN = 2;
    const BAKE = 3;
    const BUILD = 4;
    const DEPLOY_ASG = 10;
    const DEPLOY_MANAGED = 11;
}
