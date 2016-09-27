<?php

class HomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->visit('/')
             ->see('Hello Yose');
    }
    public function testContantMe()
    {
        $this->visit('/')
            ->click('Contact Me')
            ->seePageIs('https://powerrangers.herokuapp.com/ping');
    }
    public function testPingChallenge()
    {
        $this->visit('/')
            ->click('Ping Challenge')
            ->seeJson([
                'alive' => true
            ]);
    }

    public function testMineSweeper()
    {
        $response = $this->call('GET', '/minesweeper');

        $this->assertEquals(200, $response->status());
    }
}
