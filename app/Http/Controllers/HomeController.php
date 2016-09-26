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
        $input = $request->fullUrl();
        $test = explode($request->url().'?', $input);

        $exp = explode('&', $test[1]);
        $a = [];
        foreach($exp as $ex){
            $test = explode('number=', $ex);
            $a[] = $test[1];
        }

        if(count($a) > 1){
            $response = [];
            foreach ($a as $inp => $value){
                $response[$inp] = [ 'number' => $value,  'error' => 'not a number' ];
                if(is_numeric($value)){
                    if($value > 1000000){
                        $response[$inp]['number'] = intval($value);
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

                    $response[$inp] = [ 'number' => intval($value),  'decomposition' => $decomposition ];
                }
            }

            return response()->json($response, 200);
        }else{
            $response = [ 'number' => $a[0],  'error' => 'not a number' ];
            if(is_numeric($a[0])){
                if($a[0] > 1000000){
                    $response['number'] = intval($a[0]);
                    $response['error'] = 'too big number (>1e6)';
                    return response()->json($response, 200);
                }
                $index = 0;
                $decomposition = [];
                $temp = $a[0];
                for ($i = 2; $i <= $temp; $i++) {
                    while ($temp % $i == 0) {
                        $temp /= $i;
                        $decomposition[$index] = $i;
                        $index++;
                    }
                }

                $response = [ 'number' => intval($a[0]),  'decomposition' => $decomposition ];
                return response()->json($response, 200);
            }

            return response()->json($response, 200);
        }
    }

    public function minesweeper(){
    	return view('minesweeper');
    }
}
