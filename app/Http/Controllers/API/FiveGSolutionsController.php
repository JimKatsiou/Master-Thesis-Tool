<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FiveGSolutions;
use Illuminate\Http\Request;

class FiveGSolutionsController extends Controller
{
    // all fiveGSolution
    public function index()
    {
        $fiveGSolutions = FiveGSolutions::all()->toArray();
        return array_reverse($fiveGSolutions);
    }

    // add fiveGSolution
    public function add(Request $request)
    {
        $fiveGSolution = new FiveGSolutions();

        $fiveGSolution->sensors_type_a = $request->sensors_type_a;
        $fiveGSolution->number_of_5g_sensors_type_a = $request->number_of_5g_sensors_type_a;
        $fiveGSolution->sensors_type_a = $request->sensors_type_b;
        $fiveGSolution->number_of_5g_sensors_type_a = $request->number_of_5g_sensors_type_b;
        $fiveGSolution->sensors_type_a = $request->sensors_type_c;
        $fiveGSolution->number_of_5g_sensors_type_a = $request->number_of_5g_sensors_type_c;
        $fiveGSolution->save();

        return response()->json('The 5GS Solution successfully added');
    }

    // edit fiveGSolutions
    public function edit($id)
    {
        $fiveGSolution = FiveGSolutions::find($id);
        return response()->json($fiveGSolution);
    }

    // update fiveGSolution
    public function update($id, Request $request)
    {
        $fiveGSolution = FiveGSolutions::find($id);
        $fiveGSolution->update($request->all());

        return response()->json('The 5G Solution successfully updated');
    }

    // delete fiveGSolution
    public function delete($id)
    {
        $fiveGSolution = FiveGSolutions::find($id);
        $fiveGSolution->delete();

        return response()->json('The 5G Solution successfully deleted');
    }

}
