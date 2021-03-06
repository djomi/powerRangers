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

    /**
     * function for primeFactor case
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function primeFactors(Request $request)
    {
        $response = self::primeFormResponse($request);
        return response()->json((count($response) > 1 ? $response : reset($response)), 200);
    }

    public function primeFormResponse(Request $request)
    {
        $queryString = $request->getQueryString();
        $explodes = explode('&', $queryString);
        $inputs = $response = [];
        foreach($explodes as $explode){
            $secondExplodes = explode('number=', $explode);
            $inputs[] = current(array_values(array_filter( $secondExplodes )));
        }

        foreach ($inputs as $inp => $value){
            $response[$inp] = self::primeFactorFunc($value);
        }

        return $response;
    }

    public function primeForm(Request $request)
    {
        $queryString = $request->get('number');
        $html = null;
        $htmls = [];
        if($queryString){
            $inputs = explode(',', $queryString);
            $response = [];

            foreach ($inputs as $inp => $value){
                $response[$inp] = self::primeFactorFunc($value);
            }

            foreach($response as $data){
                if(isset($data['error'])){
                    if($data['error'] === 'not a number')
                        $html = $data['number'].' is '.$data['error'];
                    else if ($data['error'] === 'not an integer > 1')
                        $html = $data['number'].' is '.$data['error'];
                    else
                        $html = $data['error'];
                }else{
                    $html = $data['number']. ' = ';
                    $count = count($data['decomposition']);

                    foreach($data['decomposition'] as $key => $decomposition){
                        $html .= $decomposition;
                        if($key != ($count - 1)){
                            $html .= ' x ';
                        }
                    }
                }

                if(count($response) > 2){
                    $htmls[] = $html;
                    $html = null;
                }
            }
        }

        return view('prime-form', compact('html', 'htmls'));
    }


    /**
     * private function for primeFactor logic
     *
     * @param string $input
     * @return array
     */
    private function primeFactorFunc($input)
    {
        switch($input){
            case is_numeric($input) && $input < 1:
                $response = [
                    'number' => intval($input),
                    'error' => 'not an integer > 1'
                ];
                break;
            case is_numeric($input) && $input < 1000000:
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

                $response = [ 'number' => intval($input),  'decomposition' => $decomposition ];
                break;
            case is_numeric($input) && $input > 1000000:
                $response = [
                    'number' => intval($input),
                    'error' => 'too big number (>1e6)'
                ];
                break;
            default:
                $response = [
                    'number' => $input,
                    'error' => 'not a number'
                ];
        }
        return $response;
    }

    public function minesweeper(){
    	return view('minesweeper');
    }

    public function fire(Request $request)
    {
        $map = $request->get('map');
        $width = $request->get('width');
        $arrayMap = str_split($map,($width));

        foreach ($arrayMap as $key => $value) {
                if (str_contains($value, ['P','W','F']))
                {
                    $d[$key]['dx'] = 1;
                    $d[$key]['dy'] = 0;  
                } else { 
                    $d[$key]['dx'] = 0;
                    $d[$key]['dy'] = 1;
                }
        }



        return response()->json(['map' => $arrayMap, 'moves' => $d]);
    }
}
