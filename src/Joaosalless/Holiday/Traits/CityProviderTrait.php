<?php

namespace Joaosalless\Holiday\Traits;

trait CityProviderTrait
{
    /**
     * @param int $year
     * @param     $state
     * @param     $city
     *
     * @return array
     */
    public function getHolidaysByYear($year, $state = self::STATE_CODE, $city = self::CITY_CODE): array
    {
        $this->setYear($year);

        return array_merge(
            $this->getNationalHolidays($year),
            $this->getStateHolidays($year),
            $this->getCityHolidays($year)
        );
    }
}