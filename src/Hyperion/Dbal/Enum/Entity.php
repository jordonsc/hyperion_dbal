<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static entity ACCOUNT()
 * @method static entity PROJECT()
 * @method static entity ACTION()
 * @method static entity DISTRIBUTION()
 * @method static entity INSTANCE()
 * @method static entity CREDENTIAL()
 * @method static entity PROXY()
 * @method static entity REPOSITORY()
 */
final class Entity extends AbstractEnumeration
{
    const ACCOUNT      = 'Hyperion\Dbal\Entity\Account';
    const PROJECT      = 'Hyperion\Dbal\Entity\Project';
    const ACTION       = 'Hyperion\Dbal\Entity\Action';
    const DISTRIBUTION = 'Hyperion\Dbal\Entity\Distribution';
    const INSTANCE     = 'Hyperion\Dbal\Entity\Instance';
    const CREDENTIAL   = 'Hyperion\Dbal\Entity\Credential';
    const PROXY        = 'Hyperion\Dbal\Entity\Proxy';
    const REPOSITORY   = 'Hyperion\Dbal\Entity\Repository';
}