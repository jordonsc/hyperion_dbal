<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static DeployStrategy ASG()
 * @method static DeployStrategy MANAGED()
 */
final class DeployStrategy extends AbstractEnumeration
{
    const ASG = 0;  // Auto-scaling groups, slower - AWS specific
    const MANAGED = 1;  // Managed, quicker, manual scaling
}
 