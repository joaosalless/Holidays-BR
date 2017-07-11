<?php

namespace Joaosalless\Holiday\Contracts;

use Joaosalless\Holiday\ProviderInterface;

/**
 * Interface CityProviderInterface
 *
 * @package Joaosalless\Holiday\Contracts
 */
interface CityProviderInterface extends ProviderInterface
{
    /**
     * Return City Holidays array
     *
     * @param $year
     *
     * @return array
     */
    public function getCityHolidays($year): array;
}