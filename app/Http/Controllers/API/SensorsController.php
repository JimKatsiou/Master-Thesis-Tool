<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use App\Models\Technologies;
use Illuminate\Http\Request;

class SensorsController extends Controller
{
    // all sensor
    public function index()
    {
        $sensors = Sensor::all()->toArray();
        return array_reverse($sensors);
    }

    // add sensor
    public function add(Request $request)
    {
        $sensor = new Sensor();

        $sensor->name = $request->name;
        $sensor->technology_name = $request->technology_name;
        $technology_id = Technologies::select('id')->where('name', $request->technology_id)->first();
        $sensor->technology_id = $technology_id['id'];
        if(isset($request->description)){
            $sensor->description = $request->description;
        } else {
            $sensor->description = null;
        }
        $sensor->cost = $request->cost;
        $sensor->installation_cost = $request->installation_cost;

        $sensor->save();

        return response()->json('The sensor successfully added');
    }

    // edit sensors
    public function edit($id)
    {
        $sensor = Sensor::find($id);
        return response()->json($sensor);
    }

    // update sensor
    public function update($id, Request $request)
    {
        $sensor = Sensor::find($id);
        $sensor->update($request->all());

        return response()->json('The sensor successfully updated');
    }

    // delete sensor
    public function delete($id)
    {
        $sensor = Sensor::find($id);
        $sensor->delete();

        return response()->json('The sensor successfully deleted');
    }

    public function getNumberOfSensors()
    {
        $sensors = Sensor::all();
        $sensorsNumber = $sensors->count();
        return response()->json($sensorsNumber);
    }
}

?>
