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
            $index = 0;
            $decomposition = [];
            $temp = $input;
            for ($i = 2; $i <= $temp; $i++) {
                $count = 0;
                while ($temp % $i == 0) {
                    $temp /= $i;
                    $decomposition[$index] = $i;
                    $index++;
                    $count++;
                }
            }

            $response = [ 'number' => $input,  'decomposition' => $decomposition ];
            return response()->json($response, 200);
        }

        return response()->json($response, 200);
    }
}
