<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP\Cities;

use Joaosalless\Holiday\Provider\AbstractTest;
use Joaosalless\Holiday\Provider\BR\States\PB\Cities\JPA;

class JPATest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new JPA();
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
            [ JPA::ISO_CODE, '24.06.2017', JPA::STATE_CODE, JPA::CITY_CODE, [ 'name' => 'São João' ] ],
            [ JPA::ISO_CODE, '05.08.2017', JPA::STATE_CODE, JPA::CITY_CODE, [ 'name' => 'Aniversário de João Pessoa' ] ],
            [ JPA::ISO_CODE, '12.08.2017', JPA::STATE_CODE, JPA::CITY_CODE, [ 'name' => 'Nossa Senhora da Conceição' ] ],
            [ JPA::ISO_CODE, '20.11.2017', JPA::STATE_CODE, JPA::CITY_CODE, [ 'name' => 'Consciência Negra' ] ],
        ];
    }
}