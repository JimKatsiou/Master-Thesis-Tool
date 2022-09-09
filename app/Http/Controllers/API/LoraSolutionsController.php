<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LoraSolutions;
use Illuminate\Http\Request;

class LoraSolutionsController extends Controller
{
    // all lora Solution
    public function index()
    {
        $loraSolutions = LoraSolutions::all()->toArray();
        return array_reverse($loraSolutions);
    }

    // add lora Solution
    public function add(Request $request)
    {
        $loraSolution = new LoraSolutions();
        $loraSolution->lora_sensors_type_a = $request->lora_sensors_type_a;
        $loraSolution->number_of_lora_sensors_type_a = $request->number_of_lora_sensors_type_a;
        $loraSolution->lora_sensors_type_b = $request->lora_sensors_type_b;
        $loraSolution->number_of_lora_sensors_type_b = $request->number_of_lora_sensors_type_b;
        $loraSolution->lora_sensors_type_c = $request->lora_sensors_type_c;
        $loraSolution->number_of_lora_sensors_type_c = $request->number_of_lora_sensors_type_c;

        $loraSolution->gateways_type_a = $request->gateways_type_a;
        $loraSolution->gateways_type_b = $request->gateways_type_b;
        $loraSolution->number_of_lora_gateways_type_a = $request->number_of_lora_gateways_type_a;
        $loraSolution->number_of_lora_gateways_type_b = $request->number_of_lora_gateways_type_b;

        $loraSolution->save();

        return response()->json('The lora Solution successfully added');
    }

    // edit lora Solutions
    public function edit($id)
    {
        $loraSolution = LoraSolutions::find($id);
        return response()->json($loraSolution);
    }

    // update lora Solution
    public function update($id, Request $request)
    {
        $loraSolution = LoraSolutions::find($id);
        dd($loraSolution);
        $loraSolution->update($request->all());

        return response()->json('The lora Solution successfully updated');
    }

    // delete lora Solution
    public function delete($id)
    {
        $loraSolution = LoraSolutions::find($id);
        $loraSolution->delete();

        return response()->json('The lora Solution successfully deleted');
    }
}
