<?php

namespace Joaosalless\Holiday;

use Joaosalless\Holiday\Model\Holiday;

/**
 * Interface ProviderInterface
 */
interface ProviderInterface
{
    /**
     * @param \DateTime   $date
     * @param string      $state
     * @param string|null $city
     */
    public function getHolidayByDate(\DateTime $date, string $state = null, string $city = null);
}
