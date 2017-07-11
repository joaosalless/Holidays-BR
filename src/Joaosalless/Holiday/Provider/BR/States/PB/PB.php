<?php

namespace Joaosalless\Holiday\Provider\BR\States\PB;

use Joaosalless\Holiday\Provider\BR\BR;
use Joaosalless\Holiday\Traits\StateProviderTrait;

/**
 * Class PB
 *
 * Feriados Estaduais da Paraíba
 *
 * @package Joaosalless\Holiday\Provider\BR\States\PB
 */
class PB extends BR
{
    use StateProviderTrait;

    const STATE_CODE = 'PB';

    /**
     * Return State Holidays array
     *
     * @param int    $year
     *
     * @return array
     */
    public function getStateHolidays($year): array
    {
        return [
            '08-05' => $this->createData('Fundação do Estado da Paraíba', [ self::STATE_CODE ]),
        ];
    }
}