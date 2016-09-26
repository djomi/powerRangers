<?php

class PrimeFactorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPowOf2Number()
    {
        $this->call('GET', 'primeFactors', [ 'numbers' => 32 ]);
        $this->seeJson([ 'number' => 32, 'decomposition' => [ 2, 2, 2, 2, 2 ] ]);
    }

    public function testNotNumber()
    {
        $this->call('GET', 'primeFactors', [ 'numbers' => 'hello' ]);
        $this->seeJson([ 'number' => 'hello', 'error' => 'not a number' ]);
    }

    public function testNumber()
    {
        $this->call('GET', 'primeFactors', [ 'numbers' => 300 ]);
        $this->seeJson([ 'number' => 300, 'decomposition' => [ 2, 2, 3, 5, 5 ] ]);
    }
}
