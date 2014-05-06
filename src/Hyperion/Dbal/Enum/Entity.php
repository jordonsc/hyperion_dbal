<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static entity PROJECT()
 * @method static entity ACTION()
 * @method static entity DISTRIBUTION()
 * @method static entity INSTANCE()
 */
final class Entity extends AbstractEnumeration
{
    const PROJECT      = 'Hyperion\Dbal\Entity\Project';
    const ACTION       = 'Hyperion\Dbal\Entity\Action';
    const DISTRIBUTION = 'Hyperion\Dbal\Entity\Distribution';
    const INSTANCE     = 'Hyperion\Dbal\Entity\Instance';
} 