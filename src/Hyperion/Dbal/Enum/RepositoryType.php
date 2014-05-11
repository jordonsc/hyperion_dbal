<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static RepositoryType GIT()
 * @method static RepositoryType SVN()
 */
final class RepositoryType extends AbstractEnumeration
{
    const GIT = 0;
    const SVN = 1;
}
 