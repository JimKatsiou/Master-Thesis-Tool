<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Scenario;
use App\Models\Technologies;
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
        $scenario = new Scenario();

        $scenario->type_of_system_name = $request->type_of_system_name;
        $scenario->technology_name = $request->technology_name;
        if(isset($request->description)){
            $scenario->description = $request->description;
        } else {
            $scenario->description = null;
        }
        $technology_id = Technologies::select('id')->where('name', '=', $request->technology_name)->get();
        $scenario->technology_id = $technology_id[0]['id'];
        $scenario->save();

        return response()->json('The scenario successfully added');
    }

    // edit scenarios
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
