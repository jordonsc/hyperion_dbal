<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static BakeStatus UNBAKED()
 * @method static BakeStatus BAKING()
 * @method static BakeStatus BAKED()
 */
final class BakeStatus extends AbstractEnumeration
{
    const UNBAKED = 0;
    const BAKING  = 1;
    const BAKED   = 2;
}
 