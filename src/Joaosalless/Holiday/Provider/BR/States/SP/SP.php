<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP;

use Joaosalless\Holiday\Contracts\StateProviderInterface;
use Joaosalless\Holiday\Provider\BR\BR;
use Joaosalless\Holiday\Traits\StateProviderTrait;

/**
 * Class SP
 *
 * Feriados Estaduais de SP
 *
 * @package Joaosalless\Holiday\Provider\BR\SP
 */
class SP extends BR implements StateProviderInterface
{
    use StateProviderTrait;

    const STATE_CODE = 'SP';

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
            '07-09' => $this->createData('Revolução Constitucionalista de 1932', [self::STATE_CODE]),
        ];
    }
}