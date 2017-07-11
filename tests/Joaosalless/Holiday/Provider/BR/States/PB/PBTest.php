<?php

namespace Joaosalless\Holiday\Provider\BR\States\PB;

use Joaosalless\Holiday\Provider\AbstractTest;
use Joaosalless\Holiday\Provider\BR\BR;

class PBTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new PB();
    }

    /**
     * Provides some test dates and the expectation
     *
     * @return array
     */
    public function dateProvider()
    {
        return [
            // Feriado estadual
            [ BR::ISO_CODE, '05.08.2017',  BR::STATE_PB, null,  ['name' => 'Fundação do Estado da Paraíba']],
        ];
    }
}