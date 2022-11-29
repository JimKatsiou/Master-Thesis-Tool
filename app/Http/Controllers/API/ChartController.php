<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Classes\ResponseClass;

class ChartController extends Controller
{
    public function index():ResponseClass
    {
        $results = Result::where('technology', '5G')->get();
        //dd($results);

        $respone = new ResponseClass();
        $respone->error = 'false';
        $respone->message = 'ok';
        $respone->object = $results;

        return $respone;
    }

}

?>
