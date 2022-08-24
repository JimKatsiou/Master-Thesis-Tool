<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatlabController extends Controller
{
    // This function runs Matlab
    public function runMatlab()
    {
        exec("matlab.exe");
    }
}

?>
