<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static Provider AWS()
 * @method static Provider GOOGLE_CLOUD()
 * @method static Provider WINDOWS_AZURE()
 */
final class Provider extends AbstractEnumeration
{
    const AWS           = 0;
    const GOOGLE_CLOUD  = 1;
    const WINDOWS_AZURE = 2;
}
 