<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP\Cities;

use Joaosalless\Holiday\Provider\AbstractTest;
use Joaosalless\Holiday\Provider\BR\States\PB\Cities\CGE;

class CGETest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new CGE();
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
            [ CGE::ISO_CODE, '24.06.2017', CGE::STATE_CODE, CGE::CITY_CODE, [ 'name' => 'São João' ] ],
            [ CGE::ISO_CODE, '05.08.2017', CGE::STATE_CODE, CGE::CITY_CODE, [ 'name' => 'Aniversário de Campina Grande' ] ],
            [ CGE::ISO_CODE, '12.08.2017', CGE::STATE_CODE, CGE::CITY_CODE, [ 'name' => 'Nossa Senhora da Conceição' ] ],
        ];
    }
}