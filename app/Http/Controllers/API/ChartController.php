<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Result;
use stdClass;
use Illuminate\Http\Request;
use App\Classes\ResponseClass;
use App\Models\ResultGA;

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

    public function getFivegBestSolutionGA(Request $request)
    {
        $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        // $results = ResultGA::where('technology','=', "5G")->where('execution_date', $date)
        // ->where('simulation_nubmer','=', $data['simulation_nubmer'])->get();

        $results = ResultGA::where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->get();

        //dd('results', $results);
        
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
    }

    public function lora_cost_chart(Request $request)
    {
       // $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "LoRa")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Chepest-by-cost")->get();
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }
        
        return $response;
    }

    public function nb_cost_chart(Request $request)
    {
       // $respone = new ResponseClass();
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "NB-IoT")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Chepest-by-cost")->get();
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }        
        return $response;
    }

    public function bat_index(Request $request)
    {
       // $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "5G")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Best battery performance")->get();
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }
        
        return $response;
    }

    public function bat_lora_cost_chart(Request $request)
    {
       // $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "LoRa")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Best battery performance")->get();
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }
        
        return $response;
    }

    public function bat_nb_cost_chart(Request $request)
    {
       // $respone = new ResponseClass();
       
        $data = $request->post();
        $date = $data['date'];

        //$number = $data['number'];
        $results = Result::where('technology','=', "NB-IoT")->where('execution_date', $date)
        ->where('simulation_nubmer','=', $data['simulation_nubmer'])->where('simulation_perpuse','=',"Best battery performance")->get();
        
        if($results->isEmpty())
        {
            $response = new stdClass();
            $response->object = [];
        }
        else {
            $response = new stdClass();
            $response->object = $results;
        }
        
        return $response;
    }

    
}

?>
