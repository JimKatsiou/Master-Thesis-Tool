<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Result;
use stdClass;
use Illuminate\Http\Request;
use App\Classes\ResponseClass;

class ChartController extends Controller
{
    public function index(Request $request)
    {
       // $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "5G")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Chepest-by-cost")->get();

        //dd($results);
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }
        //$respone->error = 'false';
        //$respone->message = 'ok';
        
        return $response;
        //dd($respone);

        //return $respone;
    }
}

?>
