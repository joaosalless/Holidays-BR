<?php

namespace Joaosalless\Holiday\Provider;

use Joaosalless\Holiday\Util;

/**
 * Class AbstractTest
 */
abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Joaosalless\Holiday\ProviderInterface
     */
    protected $provider;

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
     * @param        $iso
     * @param string $date
     * @param string $state
     * @param string $city
     * @param array  $expectation
     *
     * @dataProvider dateProvider
     */
    public function testIsHoliday($iso, $date, $state, $city, array $expectation = null)
    {
        $isHoliday = $this->service->isHoliday($iso, $date, $state, $city);
        $holiday   = $this->service->getHoliday($iso, $date, $state, $city);

        if ($expectation !== null) {
            $this->assertTrue($isHoliday);
            $this->assertEquals(['name' => $holiday->getName('name')], $expectation);
        } else {
            $this->assertNotTrue($isHoliday);
        }
    }

    /**
     * @param string $iso
     * @param string $date
     * @param string $state
     * @param string $city
     * @param array  $expectation
     *
     * @dataProvider dateProvider
     */
    public function testHolidays($iso, $date, $state = null, $city = null, array $expectation = null)
    {
        $date = new \DateTime($date);
        $holiday = $this->provider->getHolidayByDate($date, $state, $city);

        if ($expectation === null) {
            $this->assertNull($holiday);
        } else {
            $this->assertNotNull($holiday, 'No Holiday found but assumed to find one on ' . $date->format('Y-m-d'));
            $this->assertEquals($date->format('d.m.Y'), $holiday->getDate()->format('d.m.Y'));

            foreach ($expectation as $property => $expectedValue) {
                $method = 'get' . ucfirst($property);
                $value = $holiday->$method();

                $this->assertEquals($expectedValue, $value);
            }
        }
    }
}
