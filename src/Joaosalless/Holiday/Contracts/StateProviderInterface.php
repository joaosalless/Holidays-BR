<?php

namespace Joaosalless\Holiday\Contracts;

use Joaosalless\Holiday\ProviderInterface;

interface StateProviderInterface extends ProviderInterface
{
    /**
     * Return State Holidays array
     *
     * @param int    $year
     *
     * @return array
     */
    public function getStateHolidays($year): array;
}