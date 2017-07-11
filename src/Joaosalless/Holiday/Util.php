<?php

namespace Joaosalless\Holiday;

use Joaosalless\Holiday\Model\Holiday;

/**
 * Class Util
 */
class Util
{
    /**
     * @param \DateTime|string $date
     *
     * @return \DateTime
     */
    protected function getDateTime($date)
    {
        if (!$date instanceof \DateTime) {
            $date = new \DateTime($date);
        }

        return $date;
    }

    /**
     * @param string $iso
     *
     * @return string
     */
    protected function getIsoCode($iso)
    {
        return strtoupper($iso);
    }

    /**
     * @param string $state
     *
     * @return string
     */
    protected function getStateCode($state)
    {
        return strtoupper($state);
    }

    /**
     * @param string $iso
     * @param string $state
     * @param string $city
     *
     * @return string | null
     */
    protected function getCityCode($iso, $state, $city)
    {
        $instance = null;
        $class    = '\\Joaosalless\\Holiday\\Provider\\' . $iso . '\\States\\' . $state . '\\Map';

        if (class_exists($class)) {
            $instance = new $class;

            return $instance::IBGE[$city];
        }

        return null;
    }

    /**
     * Instantiates a provider
     *
     * @param string $iso
     * @param null   $state
     * @param null   $city
     *
     * @return ProviderInterface
     */
    public function getProvider($iso, $state = null, $city = null)
    {
        if (!empty($city)) {
            $provider = $this->getCityProvider($iso, $state, $city);
        } else if (!empty($state)) {
            $provider = $this->getStateProvider($iso, $state);
        } else {
            $provider = $this->getIsoProvider($iso);
        }

        return $provider;
    }

    /**
     * Instantiates a provider for a given iso code
     *
     * @param string $iso
     *
     * @return ProviderInterface
     */
    protected function getIsoProvider($iso)
    {
        $instance = null;

        $class = '\\Joaosalless\\Holiday\\Provider\\' . $iso . '\\' . $iso;

        if (class_exists($class)) {
            $instance = new $class;
        }

        return $instance;
    }

    /**
     * Instantiates a provider for a given iso and state code
     *
     * @param string $iso
     * @param string $state
     *
     * @return ProviderInterface
     */
    protected function getStateProvider($iso, $state)
    {
        $instance = null;

        $class = '\\Joaosalless\\Holiday\\Provider\\' . $iso . '\\States\\' . $state . '\\' . $state;

        if (class_exists($class)) {
            $instance = new $class;
        }

        return $instance;
    }

    /**
     * Instantiates a provider for a given iso, state, and city code
     *
     * @param string $iso
     * @param string $state
     * @param string $city
     *
     * @return ProviderInterface
     */
    protected function getCityProvider($iso, $state, $city)
    {
        $instance = null;

        $cnl_code = $this->getCityCode($iso, $state, $city);

        $class = '\\Joaosalless\\Holiday\\Provider\\' . $iso . '\\States\\' . $state . '\\Cities\\' . $cnl_code;

        if (class_exists($class)) {
            $instance = new $class;
        }

        return $instance;
    }

    /**
     * Checks wether a given date is a holiday
     *
     * This method can be used to check whether a specific date is a holiday
     * in a specified country and state
     *
     * @param string           $iso
     * @param \DateTime|string $date
     * @param string           $state
     * @param string           $city
     *
     * @return bool
     */
    public function isHoliday($iso, $date = 'now', $state = null, $city = null)
    {
        return ($this->getHoliday($iso, $date, $state, $city) !== null);
    }

    /**
     * Provides detailed information about a specific holiday
     *
     * @param string           $iso
     * @param \DateTime|string $date
     * @param string           $state
     * @param string           $city
     *
     * @return Holiday
     */
    public function getHoliday($iso, $date = 'now', $state = null, $city = null)
    {
        $iso   = $this->getIsoCode($iso);
        $state = $this->getStateCode($state);
        $date  = $this->getDateTime($date);

        // Load Provider
        $provider = $this->getProvider($iso, $state, $city);

        $holiday = $provider ? $provider->getHolidayByDate($date, $state, $city) : null;

        return $holiday;
    }

}
