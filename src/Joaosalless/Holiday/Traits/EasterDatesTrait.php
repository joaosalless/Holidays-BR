<?php

namespace Joaosalless\Holiday\Traits;

use DateTime;

trait EasterDatesTrait
{
    /**
     * Returns specific date calculated by easter sunday
     *
     * @param int    $year
     * @param string $slug
     * @param bool   $formated
     *
     * @return DateTime|string
     */
    protected function getEasterDate($year, string $slug, $formated = true)
    {
        $date = $this->getEasterDates($year)[$slug];

        return $formated ? $date->format(self::DATE_FORMAT) : $date;
    }

    /**
     * Returns all dates calculated by easter sunday
     *
     * @param $year
     *
     * @return DateTime[]
     */
    protected function getEasterDates($year)
    {
        $date['DOMINGO_DE_PASCOA'] = new DateTime('21.03.' . $year);
        $date['DOMINGO_DE_PASCOA']->modify(sprintf('+%d days', easter_days($year)));
        $date['DOMINGO_DE_PASCOA']->setTimezone(new \DateTimeZone(date_default_timezone_get()));

        $date['DOMINGO_DE_CARNAVAL'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['DOMINGO_DE_CARNAVAL']->modify('-49 days');

        $date['SEGUNDA_FEIRA_DE_CARNAVAL'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['SEGUNDA_FEIRA_DE_CARNAVAL']->modify('-48 days');

        $date['TERCA_FEIRA_DE_CARNAVAL'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['TERCA_FEIRA_DE_CARNAVAL']->modify('-47 days');

        $date['QUARTA_FEIRA_DE_CINZAS'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['QUARTA_FEIRA_DE_CINZAS']->modify('-46 days');

        $data['DOMINGO_DE_RAMOS'] = clone $date['DOMINGO_DE_PASCOA'];
        $data['DOMINGO_DE_RAMOS']->modify('-7 days');

        $data['SEXTA_FEIRA_SANTA'] = clone $date['DOMINGO_DE_PASCOA'];
        $data['SEXTA_FEIRA_SANTA']->modify('-2 days');

        $data['SABADO_DE_ALELUIA'] = clone $date['DOMINGO_DE_PASCOA'];
        $data['SABADO_DE_ALELUIA']->modify('-1 days');

        $date['PENTECOSTES'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['PENTECOSTES']->modify('+49 days');

        $date['CORPUS_CHRISTI'] = clone $date['DOMINGO_DE_PASCOA'];
        $date['CORPUS_CHRISTI']->modify('+60 days');

        $easterDates = [
            'DOMINGO_DE_CARNAVAL'       => $date['DOMINGO_DE_CARNAVAL'],
            'SEGUNDA_FEIRA_DE_CARNAVAL' => $date['SEGUNDA_FEIRA_DE_CARNAVAL'],
            'TERCA_FEIRA_DE_CARNAVAL'   => $date['TERCA_FEIRA_DE_CARNAVAL'],
            'QUARTA_FEIRA_DE_CINZAS'    => $date['QUARTA_FEIRA_DE_CINZAS'],
            'SEXTA_FEIRA_SANTA'         => $data['SEXTA_FEIRA_SANTA'],
            'SABADO_DE_ALELUIA'         => $data['SABADO_DE_ALELUIA'],
            'DOMINGO_DE_PASCOA'         => $date['DOMINGO_DE_PASCOA'],
            'PENTECOSTES'               => $date['PENTECOSTES'],
            'CORPUS_CHRISTI'            => $date['CORPUS_CHRISTI'],
        ];

        return $easterDates;
    }
}