<?php

namespace Joaosalless\Holiday\Provider\BR\States\AM;

use Joaosalless\Holiday\Contracts\StateProviderInterface;
use Joaosalless\Holiday\Provider\BR\BR;
use Joaosalless\Holiday\Traits\StateProviderTrait;

/**
 * Class SP
 *
 * Feriados Estaduais de AM
 *
 * @package Joaosalless\Holiday\Provider\BR\AM
 */
class AM extends BR implements StateProviderInterface
{
    use StateProviderTrait;

    const STATE_CODE = 'AM';

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
            '09-05' => $this->createData('Elevação do Amazonas à categoria de província', [self::STATE_CODE]),
            '11-20' => $this->createData('Dia de Nossa Senhora da Conceição', [self::STATE_CODE]),
            '12-08' => $this->createData('Consciência Negra', [self::STATE_CODE]),
        ];
    }
}