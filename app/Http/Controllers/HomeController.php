<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function welcome()
    {
      return view('welcome');
    }

    public function test(Request $request)
    {
        $input = $request->input('number');
        if(is_array($input)){
            $response = [];
            foreach ($input as $inp => $value){
                $response[$inp] = [ 'number' => $value,  'error' => 'not a number' ];
                if(is_numeric($value)){
                    if($value > 1000000){
                        $response[$inp]['error'] = 'too big number (>1e6)';
                    }
                    $index = 0;
                    $decomposition = [];
                    $temp = $value;
                    for ($i = 2; $i <= $temp; $i++) {
                        while ($temp % $i == 0) {
                            $temp /= $i;
                            $decomposition[$index] = $i;
                            $index++;
                        }
                    }

                    $response[$inp] = [ 'number' => $value,  'decomposition' => $decomposition ];
                }
            }

            return response()->json($response, 200);
        }else{
            $response = [ 'number' => $input,  'error' => 'not a number' ];
            if(is_numeric($input)){
                if($input > 1000000){
                    $response['error'] = 'too big number (>1e6)';
                    return response()->json($response, 200);
                }
                $index = 0;
                $decomposition = [];
                $temp = $input;
                for ($i = 2; $i <= $temp; $i++) {
                    while ($temp % $i == 0) {
                        $temp /= $i;
                        $decomposition[$index] = $i;
                        $index++;
                    }
                }

                $response = [ 'number' => $input,  'decomposition' => $decomposition ];
                return response()->json($response, 200);
            }

            return response()->json($response, 200);
        }
    }

    public function minesweeper(){
    	return view('minesweeper');
    }
}
