<?php

namespace Joaosalless\Holiday\Provider\BR\States\SP;

use Joaosalless\Holiday\Provider\AbstractTest;
use Joaosalless\Holiday\Provider\BR\BR;

class SPTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        parent::setUp();
        $this->provider = new SP();
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
            [ BR::ISO_CODE, '09.07.2017',  BR::STATE_SP, null,  ['name' => 'Revolução Constitucionalista de 1932']],
        ];
    }
}