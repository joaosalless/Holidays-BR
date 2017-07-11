<?php

namespace Joaosalless\Holiday\Test;

use Joaosalless\Holiday\Provider\BR\BR;
use Joaosalless\Holiday\Provider\BR\States\SP\Cities\SPO;
use Joaosalless\Holiday\Util;

class UtilTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Util
     */
    protected $service;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->service = new Util();
    }

    /**
     * @param            $iso
     * @param            $date
     * @param            $state
     * @param            $city
     * @param array|null $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testLoadIso($iso, $date, $state, $city, array $expectation = null)
    {
        $provider = $this->service->getProvider($iso);

        $this->assertEquals(BR::ISO_CODE, $provider::ISO_CODE);
    }

    /**
     * @param            $iso
     * @param            $date
     * @param            $state
     * @param            $city
     * @param array|null $expectation
     *
     * @dataProvider providerStateHoliday
     */
    public function testLoadState($iso, $date, $state, $city, array $expectation = null)
    {
        $provider = $this->service->getProvider($iso, $state);

        $this->assertEquals(BR::STATE_SP, $provider::STATE_CODE);
    }

    /**
     * @param            $iso
     * @param            $date
     * @param            $state
     * @param            $city
     * @param array|null $expectation
     *
     * @dataProvider providerCityHoliday
     */
    public function testLoadCity($iso, $date, $state, $city, array $expectation = null)
    {
        $provider = $this->service->getProvider($iso, $state, $city);

        $this->assertEquals(SPO::CITY_CODE, $provider::CITY_CODE);
    }

    /**
     * @param        $iso
     * @param string $date
     * @param string $state
     * @param string $city
     * @param array  $expectation
     *
     * @dataProvider providerStateHoliday
     */
    public function testIsHoliday($iso, $date, $state, $city, array $expectation = null)
    {
        $isHoliday = $this->service->isHoliday($iso, $date, $state, $city);
        $holiday   = $this->service->getHoliday($iso, $date, $state, $city);

        $this->assertTrue($isHoliday);
        $this->assertEquals(['name' => $holiday->getName('name')], $expectation);
    }

    /**
     * @param        $iso
     * @param string $date
     * @param string $state
     * @param string $city ,
     * @param array  $expectation
     *
     * @dataProvider providerHoliday
     */
    public function testGetHoliday($iso, $date, $state, $city, array $expectation = [])
    {
        $holiday = $this->service->getHoliday($iso, $date, $state, $city);

        if ($expectation === null) {
            $this->assertNull($holiday);
        } else {
            $this->assertNotNull($holiday);
            foreach ($expectation as $property => $expected) {
                $method = 'get' . ucfirst($property);
                $actual = $holiday->$method();
                $this->assertEquals($expected, $actual);
            }
        }
    }

    /**
     * @return array
     */
    public function providerHoliday()
    {
        return [
            ['BR', '01.01.2017', null, null, ['name' => 'Dia Mundial da Paz']],
        ];
    }

    /**
     * @return array
     */
    public function providerStateHoliday()
    {
        return [
            [BR::ISO_CODE, '09.07.2017', BR::STATE_SP, null, ['name' => 'Revolução Constitucionalista de 1932']],
        ];
    }

    /**
     * @return array
     */
    public function providerCityHoliday()
    {
        return [
            [BR::ISO_CODE, '25.01.2017', BR::STATE_SP, SPO::CITY_CODE, ['name' => 'Aniversário de São Paulo']],
        ];
    }

}
