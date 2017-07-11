<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP\Cities;

use Joaosalless\Holiday\Contracts\CityProviderInterface;
use Joaosalless\Holiday\Provider\BR\States\SP\SP;
use Joaosalless\Holiday\Traits\CityProviderTrait;

/**
 * Class AAS
 *
 * Feriados Municipais de Araras - SP
 *
 * CITY_CNL  = CNL  (Código Nacional de Localidades)
 * CITY_CODE = IBGE (Código IBGE completo do Município )
 * CITY_NAME = Nome do Município
 *
 * @package Joaosalless\Holiday\Provider\BR\States\SP\Cities
 */
class AAS extends SP implements CityProviderInterface
{
    use CityProviderTrait;

    const CITY_CNL  = 'AAS';
    const CITY_CODE = '3503307';
    const CITY_NAME = 'Araras';

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

            '01-01' => $this->createData('Ano Novo', null, [ self::CITY_CODE ]),
        ];
    }
}