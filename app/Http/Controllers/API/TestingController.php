<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    // This function runs Matlab
    public function runMatlab()
    {
        dd('mpla');
        exec("matlab.exe");
    }
}

?>
