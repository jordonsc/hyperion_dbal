<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static EnvironmentType BAKERY()
 * @method static EnvironmentType TEST()
 * @method static EnvironmentType PRODUCTION()
 */
class EnvironmentType extends AbstractEnumeration
{
    const BAKERY     = 0;   // Baking only
    const TEST       = 1;   // CI/UAT/SIT
    const PRODUCTION = 2;   // Production, demo, staging
} 