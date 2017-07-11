<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP\Cities;

use Joaosalless\Holiday\Contracts\CityProviderInterface;
use Joaosalless\Holiday\Provider\BR\States\SP\SP;
use Joaosalless\Holiday\Traits\CityProviderTrait;

/**
 * Class SPO
 *
 * Feriados Municipais de São Paulo - SP
 *
 * CITY_CNL  = CNL  (Código Nacional de Localidades)
 * CITY_CODE = IBGE (Código IBGE completo do Município )
 * CITY_NAME = Nome do Município
 *
 * @package Joaosalless\Holiday\Provider\BR\States\SP\Cities
 */
class SPO extends SP implements CityProviderInterface
{
    use CityProviderTrait;

    const CITY_CNL  = 'SPO';
    const CITY_CODE = '3550308';
    const CITY_NAME = 'São Paulo';

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

            '01-25' => $this->createData('Aniversário de São Paulo', null, [ self::CITY_CODE ]),
            '11-20' => $this->createData('Consciência Negra',        null, [ self::CITY_CODE ]),
        ];
    }
}