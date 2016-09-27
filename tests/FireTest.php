<?php

class FireTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFireGeek()
    {
        $response = $this->call('GET', 'fire/geek', [ 'width' => 3, 'map' => '...P...WF'])->getContent();
        $this->assertEquals(json_encode([ 'map'=> ["...","P..",".WF" ],'moves'=> [['dx'=> 0, 'dy'=> 1],[ 'dx'=> 1, 'dy'=> 0 ],
        [ 'dx'=> 1, 'dy'=> 0 ]]]), $response);
    }

   
}
