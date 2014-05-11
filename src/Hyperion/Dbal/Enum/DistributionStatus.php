<?php
namespace Hyperion\Dbal\Enum;

use Eloquent\Enumeration\AbstractEnumeration;

/**
 * @method static DistributionStatus PENDING()
 * @method static DistributionStatus BUILDING()
 * @method static DistributionStatus ACTIVE()
 * @method static DistributionStatus SCALING()
 * @method static DistributionStatus TERMINATING()
 * @method static DistributionStatus FROZEN()
 * @method static DistributionStatus TERMINATED()
 */
final class DistributionStatus extends AbstractEnumeration
{
    const PENDING     = 0;
    const BUILDING    = 1;
    const ACTIVE      = 2;
    const SCALING     = 3;
    const TERMINATING = 4;
    const FROZEN      = 5;
    const TERMINATED  = 6;
}
 