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
        $response = [ 'number' => $input,  'error' => 'not a number' ];
        if(is_numeric($input)){
            $r = ($input & ($input - 1)) === 0 ? true : false;
            if($r === true){
                $check = false;
                $a = [];
                $i = 0;
                $temp = $input;
                while(!$check){
                    $temp = $temp / 2;
                    $a[$i] = 2;
                    $i++;

                    if($temp == 1){
                        $check = true;
                    }
                }

                $response = [ 'number' => $input,  'decomposition' => $a ];

                return response()->json($response, 200);
            }
        }

        return response()->json($response, 200);
    }
}
