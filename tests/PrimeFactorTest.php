<?php

class PrimeFactorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNumber()
    {
        $this->call('GET', 'primeFactors', [ 'numbers' => 32 ]);
        $this->seeJson([ 'number' => 32, 'decomposition' => [ 2, 2, 2, 2, 2 ] ]);
    }

    public function testNotNumber()
    {
        $this->call('GET', 'primeFactors', [ 'numbers' => 'hello' ]);
        $this->seeJson([ 'number' => 'hello', 'error' => 'not a number' ]);
    }
}
