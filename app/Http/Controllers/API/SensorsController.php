<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Battery;
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

        $data = $request->post();
        $sensor->name = $data['name'];
        
        $technology = Technologies::where('name', $data['technology_id'])->first();
        $sensor->technology_id = $technology['id'];
        $sensor->technology_name = $technology['name'];
        if(isset($data['description'])){
            $sensor->description = $data['description'];
        } else {
            $sensor->description = null;
        }
        $sensor->cost = $data['cost'];
        $sensor->installation_cost = $data['installation_cost'];
        $battery = Battery::select('id')->where('name', $data['battery'])->first();
        $sensor->battery_id = $battery['id'];

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
