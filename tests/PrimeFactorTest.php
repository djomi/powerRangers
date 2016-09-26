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
        $response = $this->call('GET', 'primeFactors', [
            'numbers' => 4096
        ]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
