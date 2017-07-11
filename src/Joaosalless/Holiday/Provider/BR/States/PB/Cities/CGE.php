<?php

namespace Joaosalless\Holiday\Provider\BR\States\PB\Cities;

use Joaosalless\Holiday\Contracts\CityProviderInterface;
use Joaosalless\Holiday\Provider\BR\States\PB\PB;
use Joaosalless\Holiday\Traits\CityProviderTrait;

/**
 * Class CGE
 *
 * Feriados Municipais de Campina Grande - PB
 *
 * CITY_CNL  = CNL  (Código Nacional de Localidades)
 * CITY_CODE = IBGE (Código IBGE completo do Município )
 * CITY_NAME = Nome do Município
 *
 * @package Joaosalless\Holiday\Provider\BR\States\PB\Cities
 */
class CGE extends PB implements CityProviderInterface
{
    use CityProviderTrait;

    const CITY_CNL  = 'CGE';
    const CITY_CODE = '2504009';
    const CITY_NAME = 'Campina Grande';

    /**
     * Return City Holidays array
     *
     * @param $year
     *
     * @return array
     */
    public function getCityHolidays($year): array
    {
        return [

            $this->getEasterDate($year,'SEXTA_FEIRA_SANTA') => $this->createData('Paixão de Cristo'),
            $this->getEasterDate($year,'CORPUS_CHRISTI')    => $this->createData('Corpus Christi'),

            '06-24' => $this->createData('São João',                      null, [ self::CITY_CODE ]),
            '08-05' => $this->createData('Aniversário de Campina Grande', null, [ self::CITY_CODE ]),
            '08-12' => $this->createData('Nossa Senhora da Conceição',    null, [ self::CITY_CODE ]),
        ];
    }
}