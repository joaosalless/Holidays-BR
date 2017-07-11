<?php

namespace Joaosalless\Holiday\Provider\BR;

use Joaosalless\Holiday\Provider\AbstractTest;

/**
 * Class BRTest
 */
class BRTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new BR();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return [

            // Feriados nacionais
            [BR::ISO_CODE, '01.01.2017', null, null, ['name' => 'Dia Mundial da Paz']],
            [BR::ISO_CODE, '28.02.2016', null, null, null],
            [BR::ISO_CODE, '28.02.2017', null, null, ['name' => 'Terça-feira de Carnaval']],
            [BR::ISO_CODE, '14.04.2016', null, null, null],
            [BR::ISO_CODE, '14.04.2017', null, null, ['name' => 'Paixão de Cristo']],
            [BR::ISO_CODE, '21.04.2017', null, null, ['name' => 'Tiradentes']],
            [BR::ISO_CODE, '01.05.2017', null, null, ['name' => 'Dia do Trabalhador']],
            [BR::ISO_CODE, '31.05.2018', null, null, ['name' => 'Corpus Christi']],
            [BR::ISO_CODE, '15.06.2017', null, null, ['name' => 'Corpus Christi']],
            [BR::ISO_CODE, '02.11.2017', null, null, ['name' => 'Finados']],
            [BR::ISO_CODE, '07.09.2017', null, null, ['name' => 'Independência do Brasil']],
            [BR::ISO_CODE, '12.10.2017', null, null, ['name' => 'Nossa Senhora Aparecida']],
            [BR::ISO_CODE, '15.11.2017', null, null, ['name' => 'Proclamação da República']],
            [BR::ISO_CODE, '25.12.2017', null, null, ['name' => 'Natal']],

        ];
    }
}
