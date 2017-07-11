<?php

namespace Joaosalless\Holiday\Provider\BR;

use Joaosalless\Holiday\Traits\ProviderTrait;
use Joaosalless\Holiday\Provider\AbstractProvider;
use Joaosalless\Holiday\Provider\BR\Traits\EasterDatesTrait;

/**
 * BR Class
 *
 * Brazilian Holiday provider
 *
 * @author João Sales <joaosalless@gmail.com>
 * @since  2017-06-29
 *
 * @license MIT
 **/
class BR extends AbstractProvider
{
    use ProviderTrait;

    const ISO_CODE    = 'BR';
    const DATE_FORMAT = 'm-d';
    const CITY_CNL    = null;
    const CITY_CODE   = null;
    const CITY_NAME   = null;
    const STATE_CODE  = null;
    const STATE_AC    = "AC";
    const STATE_AL    = "AL";
    const STATE_AM    = "AM";
    const STATE_AP    = "AP";
    const STATE_BA    = "BA";
    const STATE_CE    = "CE";
    const STATE_DF    = "DF";
    const STATE_ES    = "ES";
    const STATE_GO    = "GO";
    const STATE_MA    = "MA";
    const STATE_MG    = "MG";
    const STATE_MS    = "MS";
    const STATE_MT    = "MT";
    const STATE_PA    = "PA";
    const STATE_PB    = "PB";
    const STATE_PE    = "PE";
    const STATE_PI    = "PI";
    const STATE_PR    = "PR";
    const STATE_RJ    = "RJ";
    const STATE_RN    = "RN";
    const STATE_RO    = "RO";
    const STATE_RR    = "RR";
    const STATE_RS    = "RS";
    const STATE_SC    = "SC";
    const STATE_SE    = "SE";
    const STATE_SP    = "SP";
    const STATE_TO    = "TO";

    /**
     * Return National Holidays array
     *
     * @param $year
     *
     * @return array
     */
    public function getNationalHolidays($year): array
    {
        $this->setYear($year);

        return [

            // Fixed dates
            '01-01' => $this->createData('Dia Mundial da Paz'),
            '04-21' => $this->createData('Tiradentes'),
            '05-01' => $this->createData('Dia do Trabalhador'),
            '09-07' => $this->createData('Independência do Brasil'),
            '10-12' => $this->createData('Nossa Senhora Aparecida'),
            '11-02' => $this->createData('Finados'),
            '11-15' => $this->createData('Proclamação da República'),
            '12-25' => $this->createData('Natal'),

            // Variable dates
            $this->getEasterDate($year,'DOMINGO_DE_CARNAVAL')     => $this->createData('Domingo de Carnaval'),
            $this->getEasterDate($year,'TERCA_FEIRA_DE_CARNAVAL') => $this->createData('Terça-feira de Carnaval'),
            $this->getEasterDate($year,'QUARTA_FEIRA_DE_CINZAS')  => $this->createData('Quarta-feira de Cinzas'),
            $this->getEasterDate($year,'SEXTA_FEIRA_SANTA')       => $this->createData('Paixão de Cristo'),
            $this->getEasterDate($year,'SABADO_DE_ALELUIA')       => $this->createData('Sábado de Aleluia'),
            $this->getEasterDate($year,'DOMINGO_DE_PASCOA')       => $this->createData('Domingo de Páscoa'),
            $this->getEasterDate($year,'CORPUS_CHRISTI')          => $this->createData('Corpus Christi'),

        ];
    }
}
