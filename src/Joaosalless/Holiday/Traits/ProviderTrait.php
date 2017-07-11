<?php

namespace Joaosalless\Holiday\Traits;

trait ProviderTrait
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

        return $this->getNationalHolidays($year);
    }
}