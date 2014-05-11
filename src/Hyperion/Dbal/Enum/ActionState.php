<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static ActionState PENDING()
 * @method static ActionState ACTIVE()
 * @method static ActionState COMPLETED()
 */
final class ActionState extends AbstractEnumeration
{
    const PENDING   = 0;
    const ACTIVE    = 1;
    const COMPLETED = 2;
}
 