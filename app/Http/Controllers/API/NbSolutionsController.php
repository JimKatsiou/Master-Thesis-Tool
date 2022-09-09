<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\NbSolutions;
use Illuminate\Http\Request;

class NbSolutionsController extends Controller
{
    // all Nb Solution
    public function index()
    {
        $nbSolutions = NbSolutions::all()->toArray();
        return array_reverse($nbSolutions);
    }

    // add nb Solution
    public function add(Request $request)
    {
        $nbSolution = new NbSolutions();

        $nbSolution->type_of_system_name = $request->type_of_system_name;
        $nbSolution->technology_name = $request->technology_name;
        if(isset($request->description)){
            $nbSolution->description = $request->description;
        } else {
            $nbSolution->description = null;
        }

        $nbSolution->save();

        return response()->json('The nb Solution successfully added');
    }

    // edit nb Solution
    public function edit($id)
    {
        $nbSolution = NbSolutions::find($id);
        return response()->json($nbSolution);
    }

    // update nbSolution
    public function update($id, Request $request)
    {
        $nbSolution = NbSolutions::find($id);
        $nbSolution->update($request->all());

        return response()->json('The nbSolution successfully updated');
    }

    // delete nbSolution
    public function delete($id)
    {
        $nbSolution = NbSolutions::find($id);
        $nbSolution->delete();

        return response()->json('The nbSolution successfully deleted');
    }

}
