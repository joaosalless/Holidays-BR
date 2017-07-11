<?php

namespace Joaosalless\Holiday\Model;

/**
 * Class Holiday
 */
class Holiday
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var array
     */
    protected $states;
    /**
     * @var array
     */
    protected $cities;

    /**
     * Constructor
     *
     * @param string    $name
     * @param \DateTime $date
     * @param array     $states
     * @param array     $cities
     */
    public function __construct($name = null, \DateTime $date = null, array $states = null, array $cities = null)
    {
        $this->name   = $name;
        $this->date   = $date;
        $this->states = $states;
        $this->cities = $cities;
    }

    /**
     * @param string $name
     *
     * @return Holiday
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $date
     *
     * @return Holiday
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param array $states
     *
     * @return Holiday
     */
    public function setStates(array $states)
    {
        $this->states = $states;

        return $this;
    }

    /**
     * @return array
     */
    public function getStates()
    {
        return $this->states;
    }

    /**
     * @param array $cities
     *
     * @return Holiday
     */
    public function setCities(array $cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * @return array
     */
    public function getCities()
    {
        return $this->cities;
    }

}
