<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static Tenancy VPC()
 * @method static Tenancy DEDICATED()
 */
class Tenancy extends AbstractEnumeration
{
    const VPC       = 0;
    const DEDICATED = 1;
}
