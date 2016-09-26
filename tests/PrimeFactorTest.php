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
        $response = $this->call('GET', 'primeFactors', [ 'number' => 32 ])->getContent();
        $this->assertEquals(json_encode([ 'number' => 32, 'decomposition' => [ 2, 2, 2, 2, 2 ] ]), $response);
    }

    public function testNotNumber()
    {
        $response = $this->call('GET', 'primeFactors', [ 'number' => 'hello' ])->getContent();
        $this->assertEquals(json_encode([ 'number' => 'hello', 'error' => 'not a number' ]), $response);
    }

    public function testNumber()
    {
        $response = $this->call('GET', 'primeFactors', [ 'number' => 300 ])->getContent();
        $this->assertEquals(json_encode([ 'number' => 300, 'decomposition' => [ 2, 2, 3, 5, 5 ] ]), $response);
    }

    public function testBiggerThan1e6()
    {
        $response = $this->call('GET', 'primeFactors', [ 'number' => 1000001 ])->getContent();
        $this->assertEquals(json_encode([ 'number' => 1000001, 'error' => 'too big number (>1e6)' ]), $response);

    }
}
