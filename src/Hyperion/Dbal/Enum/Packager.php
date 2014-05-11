<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static Packager YUM()
 * @method static Packager APT()
 */
final class Packager extends AbstractEnumeration
{
    const YUM = 0;
    const APT = 1;
}
 