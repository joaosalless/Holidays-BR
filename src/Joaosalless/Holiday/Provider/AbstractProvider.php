<?php

namespace Joaosalless\Holiday\Provider;

use Joaosalless\Holiday\Traits\EasterDatesTrait;
use Joaosalless\Holiday\Model\Holiday;
use Joaosalless\Holiday\ProviderInterface;

/**
 * Class AbstractProvider
 */
abstract class AbstractProvider implements ProviderInterface
{
    use EasterDatesTrait;

    const ISO_CODE = 'BR';
    const DATE_FORMAT = 'm-d';
    const CITY_CNL = null;
    const CITY_CODE = null;
    const CITY_NAME = null;
    const STATE_CODE = null;

    protected $isoCode;
    protected $year;

    /**
     * @param int $year
     * @param     $state
     * @param     $city
     *
     * @return array
     */
    public abstract function getHolidaysByYear($year, $state = self::STATE_CODE, $city = self::CITY_CODE): array;

    /**
     * Return National Holidays array
     *
     * @param $year
     *
     * @return array
     */
    public abstract function getNationalHolidays($year): array;

    /**
     * Set IsoCode
     *
     * @param $isoCode
     */
    public function setIsoCode($isoCode)
    {
        $this->isoCode = $isoCode;
    }

    /**
     * Get IsoCode
     */
    public function getIsoCode()
    {
        $this->isoCode;
    }

    /**
     * Set Year
     *
     * @param $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Get year
     */
    public function getYear()
    {
        $this->year;
    }

    /**
     * @param \DateTime   $date
     * @param string      $state
     * @param string|null $city
     *
     * @return Holiday | null
     */
    public function getHolidayByDate(\DateTime $date, string $state = null, string $city = null)
    {
        $day = $date->format(self::DATE_FORMAT);

        $holidays = $this->getHolidaysByYear($date->format('Y'), $state, $city);

        if (isset($holidays[$day])) {

            $holiday = $this->createModelFromData($holidays[$day], $date);

            if (!$this->hasCity($holiday, $city)) {
                return null;
            }

            if (!$this->hasState($holiday, $state)) {
                return null;
            }

            return $holiday;
        }

        return null;
    }

    /**
     * @param array     $data
     * @param \DateTime $date
     *
     * @return Holiday
     */
    protected function createModelFromData(array $data, \DateTime $date)
    {
        $holiday = new Holiday(
            $data['name'],
            $date,
            $data['states'],
            $data['cities']
        );

        return $holiday;
    }

    /**
     * @param Holiday $holiday
     * @param string  $state
     *
     * @return bool
     */
    protected function hasState(Holiday $holiday, $state = null)
    {
        if ($state === null) {
            return true;
        }

        $states = $holiday->getStates();
        if (empty($states)) {
            return true;
        }

        if (is_array($states) && in_array($state, $states)) {
            return true;
        }

        return false;
    }

    /**
     * @param Holiday $holiday
     * @param string  $city
     *
     * @return bool
     */
    protected function hasCity(Holiday $holiday, $city = null)
    {
        if ($city === null) {
            return true;
        }

        $cities = $holiday->getCities();
        if (empty($cities)) {
            return true;
        }

        if (is_array($cities) && in_array($city, $cities)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $name
     * @param array  $states
     * @param array  $cities
     *
     * @return array
     */
    protected function createData($name, array $states = null, array $cities = null)
    {
        return [
            'name'   => $name,
            'states' => $states,
            'cities' => $cities,
        ];
    }

}
