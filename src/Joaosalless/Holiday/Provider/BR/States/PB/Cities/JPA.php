<?php

namespace Joaosalless\Holiday\Provider\BR\States\PB\Cities;

use Joaosalless\Holiday\Contracts\CityProviderInterface;
use Joaosalless\Holiday\Provider\BR\States\PB\PB;
use Joaosalless\Holiday\Traits\CityProviderTrait;

/**
 * Class JPA
 *
 * Feriados Municipais de João Pessoa - PB
 *
 * CITY_CNL  = CNL  (Código Nacional de Localidades)
 * CITY_CODE = IBGE (Código IBGE completo do Município )
 * CITY_NAME = Nome do Município
 *
 * @package Joaosalless\Holiday\Provider\BR\States\PB\Cities
 */
class JPA extends PB implements CityProviderInterface
{
    use CityProviderTrait;

    const CITY_CNL  = 'JPA';
    const CITY_CODE = '2507507';
    const CITY_NAME = 'João Pessoa';

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

            '06-24' => $this->createData('São João',                   null, [self::CITY_CODE]),
            '08-05' => $this->createData('Aniversário de João Pessoa', null, [self::CITY_CODE]),
            '08-12' => $this->createData('Nossa Senhora da Conceição', null, [self::CITY_CODE]),
            '11-20' => $this->createData('Consciência Negra',          null, [self::CITY_CODE]),
        ];
    }
}