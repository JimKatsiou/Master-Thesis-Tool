<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use Illuminate\Http\Request;

class ScenarioController extends Controller
{
    // all scenario
    public function index()
    {
        $scenarios = Scenario::all()->toArray();
        return array_reverse($scenarios);
    }

    // add scenario
    public function add(Request $request)
    {
        $scenario = new Scenario([
            'type_of_system_name' => $request->type_of_system_name,
            'technology_name' => $request->technology_name
        ]);
        $scenario->save();

        return response()->json('The scenario successfully added');
    }

    // edit scenarioσ
    public function edit($id)
    {
        $scenario = Scenario::find($id);
        return response()->json($scenario);
    }

    // update scenario
    public function update($id, Request $request)
    {
        $scenario = Scenario::find($id);
        $scenario->update($request->all());

        return response()->json('The scenario successfully updated');
    }

    // delete scenario
    public function delete($id)
    {
        $scenario = Scenario::find($id);
        $scenario->delete();

        return response()->json('The scenario successfully deleted');
    }

}

?>
