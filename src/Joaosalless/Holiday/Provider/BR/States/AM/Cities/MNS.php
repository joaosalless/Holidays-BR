<?php

namespace Joaosalless\Holiday\Provider\BR\States\AM\Cities;

use Joaosalless\Holiday\Contracts\CityProviderInterface;
use Joaosalless\Holiday\Provider\BR\States\AM\AM;
use Joaosalless\Holiday\Traits\CityProviderTrait;

/**
 * Class MAN
 *
 * Feriados Municipais de Manaus - AM
 *
 * CITY_CNL  = CNL  (Código Nacional de Localidades)
 * CITY_CODE = IBGE (Código IBGE completo do Município )
 * CITY_NAME = Nome do Município
 *
 * @package Joaosalless\Holiday\Provider\BR\States\AM\Cities
 */
class MNS extends AM implements CityProviderInterface
{
    use CityProviderTrait;

    const CITY_CNL  = 'MNS';
    const CITY_CODE = '1302603';
    const CITY_NAME = 'Manaus';

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

            '10-24' => $this->createData('Aniversário de Manaus', null, [ self::CITY_CODE ]),
        ];
    }
}