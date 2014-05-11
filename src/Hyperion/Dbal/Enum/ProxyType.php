<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static ProxyType SOCKS5()
 * @method static ProxyType HTTP()
 */
final class ProxyType extends AbstractEnumeration
{
    const SOCKS5 = 0;
    const HTTP   = 1;
}
 