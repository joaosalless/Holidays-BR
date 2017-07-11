<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP\Cities;

use Joaosalless\Holiday\Provider\AbstractTest;

class SPOTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new SPO();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return [
            // Feriados municipais
            [ SPO::ISO_CODE, '25.01.2017', SPO::STATE_CODE, SPO::CITY_CODE, [ 'name' => 'Aniversário de São Paulo' ] ],
        ];
    }
}