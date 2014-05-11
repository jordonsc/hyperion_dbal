<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static InstanceState PENDING()
 * @method static InstanceState STARTING()
 * @method static InstanceState RUNNING()
 * @method static InstanceState SHUTTING_DOWN()
 * @method static InstanceState TERMINATING()
 * @method static InstanceState STOPPED()
 * @method static InstanceState TERMINATED()
 */
final class InstanceState extends AbstractEnumeration
{
    const PENDING       = 0;
    const STARTING      = 1;
    const RUNNING       = 2;
    const SHUTTING_DOWN = 3;
    const TERMINATING   = 4;
    const STOPPED       = 5;
    const TERMINATED    = 6;
}
 