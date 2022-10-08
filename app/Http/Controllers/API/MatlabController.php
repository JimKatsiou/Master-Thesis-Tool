<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FiveGSolutions;
use App\Models\LoraSolutions;
use App\Models\NbSolutions;
use App\Models\Battery;
use App\Models\Gateway;
use App\Models\Sensor;
use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MatlabController extends Controller
{
    // This function runs Matlab
    public function runMatlab()
    {
        //exec("matlab.exe");
    }

    public function getData5gWQ()
    {
        $five_g_scenario_data = FiveGSolutions::inRandomOrder()->limit(20)->get();
        $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['five_g_sensors_type_a'] = $data['five_g_sensors_type_a'];
            $scenario_data[$i]['five_g_sensors_type_b'] = $data['five_g_sensors_type_b'];
            $scenario_data[$i]['five_g_sensors_type_c'] = $data['five_g_sensors_type_c'];
            $scenario_data[$i]['numberOf5gSensorsTypeA'] = $data['number_of_5g_sensors_type_a'];
            $scenario_data[$i]['numberOf5gSensorsTypeB'] = $data['number_of_5g_sensors_type_b'];
            $scenario_data[$i]['numberOf5gSensorsTypeC'] = $data['number_of_5g_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_5g_scenario' . '.json'; //create dynamic json file name
        $saved_file = '5g_scenario' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

        $response = new stdClass();
        $response->file_name = $file_name;
        $response->s_data = $s_data;
        $response->scenario_data = $scenario_data;
        return $response;
    }

    public function get_data_Lora_wq(Request $request)
    {
        $data = $request->post();
        dd($data);
        $lora_scenario_data = LoraSolutions::inRandomOrder()->limit(20)->get();
        $i = 0;
        foreach($lora_scenario_data as $data)
        {
            $scenario_data[$i]['lora_sensors_type_a'] = $data['lora_sensors_type_a'];
            $scenario_data[$i]['lora_sensors_type_b'] = $data['lora_sensors_type_b'];
            $scenario_data[$i]['lora_sensors_type_c'] = $data['lora_sensors_type_c'];
            $scenario_data[$i]['numberOfLoraSensorsTypeA'] = $data['number_of_lora_sensors_type_a'];
            $scenario_data[$i]['numberOfLoraSensorsTypeB'] = $data['number_of_lora_sensors_type_b'];
            $scenario_data[$i]['numberOfLoraSensorsTypeC'] = $data['number_of_lora_sensors_type_c'];

            $scenario_data[$i]['gateways_type_a'] = $data['gateways_type_a'];
            $scenario_data[$i]['gateways_type_b'] = $data['gateways_type_b'];
            $scenario_data[$i]['numberOfGatewaysTypeA'] = $data['number_of_lora_gateways_type_a'];
            $scenario_data[$i]['numberOfGatewaysTypeB'] = $data['number_of_lora_gateways_type_b'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_lora_scenario' . '.json'; //create dynamic json file name
        $saved_file = 'lora_scenario' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

        $response = new stdClass();
        $response->file_name = $file_name;
        $response->s_data = $s_data;
        $response->scenario_data = $scenario_data;
        return $response;
    }

    public function get_data_NB_wq()
    {
        $five_g_scenario_data = NbSolutions::inRandomOrder()->limit(20)->get();

        $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['nb_sensors_type_a'] = $data['nb_sensors_type_a'];
            $scenario_data[$i]['nb_sensors_type_b'] = $data['nb_sensors_type_b'];
            $scenario_data[$i]['nb_sensors_type_c'] = $data['nb_sensors_type_c'];
            $scenario_data[$i]['numberOfNBSensorsTypeA'] = $data['number_of_nb_sensors_type_a'];
            $scenario_data[$i]['numberOfNBSensorsTypeB'] = $data['number_of_nb_sensors_type_b'];
            $scenario_data[$i]['numberOfNBSensorsTypeC'] = $data['number_of_nb_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_nb_scenario' . '.json'; //create dynamic json file name
        $saved_file = 'nb_scenario' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        $response = new stdClass();
        $response->file_name = $file_name;
        $response->s_data = $s_data;
        $response->scenario_data = $scenario_data;
        return $response;
    }

    public function get_data_battery(Request $request)
    {
        $data = $request->post();
        $fivegSolutions = $data['fiveGSolutionData'];
        $loraSolutions = $data['loraSolutionData'];
        $nbSolutions = $data['nbSolutionData'];

        $i = 0;
        foreach ($fivegSolutions as $fiveg)
        {
            $batteryA = Sensor::select('battery_id')->where('name', '=', $fiveg['five_g_sensors_type_a'])->first();
            $batteryA = Battery::where('id', $batteryA[0]['battery_id'])->first();
            $batteries[$i]['battery_capacity_5g_type_a'] = $batteryA->capacity;
            $batteries[$i]['battery_consumption_5g_type_a'] = $batteryA->consumption;

            $batteries[$i]['battery_capacity_5g_type_b'] = $data['battery_capacity_5g_type_b'];
            $batteries[$i]['battery_consumption_5g_type_b'] = $data['battery_consumption_5g_type_b'];

            $batteries[$i]['battery_capacity_5g_type_c'] = $data['battery_capacity_5g_type_c'];
            $batteries[$i]['battery_consumption_5g_type_c'] = $data['battery_consumption_5g_type_c'];
        }

        $i = 0;
        foreach ($loraSolutions as $lora)
        {

        }

        $i = 0;
        foreach ($nbSolutions as $nb)
        {

        }

        // Η θα το εξελύξω και θα είναι με βάση τα names από τις παραπάνω
        $i = 0;

        $scenario_data[$i]['battery_capacity_5g_type_a'] = $data['battery_capacity_5g_type_a'];
        $scenario_data[$i]['battery_consumption_5g_type_a'] = $data['battery_consumption_5g_type_a'];
        $scenario_data[$i]['battery_capacity_5g_type_b'] = $data['battery_capacity_5g_type_b'];
        $scenario_data[$i]['battery_consumption_5g_type_b'] = $data['battery_consumption_5g_type_b'];
        $scenario_data[$i]['battery_capacity_5g_type_c'] = $data['battery_capacity_5g_type_c'];
        $scenario_data[$i]['battery_consumption_5g_type_c'] = $data['battery_consumption_5g_type_c'];
        $scenario_data[$i]['battery_capacity_nb_type_a'] = $data['battery_capacity_nb_type_a'];
        $scenario_data[$i]['battery_consumption_nb_type_a'] = $data['battery_consumption_nb_type_a'];
        $scenario_data[$i]['battery_capacity_nb_type_b'] = $data['battery_capacity_nb_type_b'];
        $scenario_data[$i]['battery_consumption_nb_type_b'] = $data['battery_consumption_nb_type_b'];
        $scenario_data[$i]['battery_capacity_nb_type_c'] = $data['battery_capacity_nb_type_c'];
        $scenario_data[$i]['battery_consumption_nb_type_c'] = $data['battery_consumption_nb_type_c'];
        $scenario_data[$i]['battery_capacity_lora_type_a'] = $data['battery_capacity_lora_type_a'];
        $scenario_data[$i]['battery_consumption_lora_type_a'] = $data['battery_consumption_lora_type_a'];
        $scenario_data[$i]['battery_capacity_lora_type_b'] = $data['battery_capacity_lora_type_b'];
        $scenario_data[$i]['battery_consumption_lora_type_b'] = $data['battery_consumption_lora_type_b'];
        $scenario_data[$i]['battery_capacity_lora_type_c'] = $data['battery_capacity_lora_type_c'];
        $scenario_data[$i]['battery_consumption_lora_type_c'] = $data['battery_consumption_lora_type_c'];
        $scenario_data[$i]['battery_capacity_lora_gateway_type_a'] = $data['battery_capacity_lora_gateway_type_a'];
        $scenario_data[$i]['battery_consumption_lora_gateway_type_a'] = $data['battery_consumption_lora_gateway_type_a'];
        $scenario_data[$i]['battery_capacity_lora_gateway_type_b'] = $data['battery_capacity_lora_gateway_type_b'];
        $scenario_data[$i]['battery_consumption_lora_gateway_type_b'] = $data['battery_consumption_lora_gateway_type_b'];
        $i++;


        //For dynamic json file
        $file_name = date('d-m-Y') . '_battery' . '.json'; //create dynamic json file name
        $saved_file = 'battery' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

        return $file_name;
    }

    public function get_data_cost(Request $request)
    {

        $data = $request->post();
        $fivegSolutions = $data['fiveGSolutionData'];
        $loraSolutions = $data['loraSolutionData'];
        $nbSolutions = $data['nbSolutionData'];

        $i = 0;
        foreach ($fivegSolutions as $fiveg)
        {
            $sensorA = Sensor::where('name', '=', $fiveg['five_g_sensors_type_a'])->first();
            $scenario_data[$i]['cost_5g_type_a'] = $sensorA['cost'];
            $scenario_data[$i]['installation_cost_5g_type_a'] = $sensorA['installation_cost'];

            $sensorB = Sensor::where('name', '=', $fiveg['five_g_sensors_type_b'])->first();
            $scenario_data[$i]['cost_5g_type_b'] = $sensorB['cost'];
            $scenario_data[$i]['installation_cost_5g_type_b'] = $sensorB['installation_cost'];

            $sensorC = Sensor::where('name', '=', $fiveg['five_g_sensors_type_c'])->first();
            $scenario_data[$i]['cost_5g_type_c'] = $sensorC['cost'];
            $scenario_data[$i]['installation_cost_5g_type_c'] = $sensorC['installation_cost'];
            $i++;
        }
        $i = 0;
        foreach ($loraSolutions as $lora)
        {
            $sensorA = Sensor::where('name', '=', $fiveg['lora_sensors_type_a'])->first();
            $scenario_data[$i]['cost_lora_type_a'] = $sensorA['cost'];
            $scenario_data[$i]['installation_cost_lora_type_a'] = $sensorA['installation_cost'];

            $sensorB = Sensor::where('name', '=', $fiveg['lora_sensors_type_b'])->first();
            $scenario_data[$i]['cost_lora_type_b'] = $sensorB['cost'];
            $scenario_data[$i]['installation_cost_lora_type_b'] = $sensorB['installation_cost'];

            $sensorC = Sensor::where('name', '=', $fiveg['lora_sensors_type_c'])->first();
            $scenario_data[$i]['cost_lora_type_c'] = $sensorC['cost'];
            $scenario_data[$i]['installation_cost_lora_type_c'] = $sensorC['installation_cost'];

            $sensorC = Gateway::where('name', '=', $fiveg['gateways_type_a'])->first();
            $scenario_data[$i]['cost_lora_gateway_type_a'] = $sensorC['cost'];
            $scenario_data[$i]['installation_lora_gateway_type_a'] = $sensorC['installation_cost'];

            $sensorC = Gateway::where('name', '=', $fiveg['gateways_type_b'])->first();
            $scenario_data[$i]['cost_lora_gateway_type_b'] = $sensorC['cost'];
            $scenario_data[$i]['installation_lora_gateway_type_b'] = $sensorC['installation_cost'];
            $i ++;
        }
        $i = 0;
        foreach ($nbSolutions as $nb)
        {

            $i++;
        }

            $scenario_data[$i]['cost_nb_type_a'] = $data['cost_nb_type_a'];
            $scenario_data[$i]['installation_cost_nb_type_a'] = $data['installation_cost_nb_type_a'];
            $scenario_data[$i]['cost_nb_type_b'] = $data['cost_nb_type_b'];
            $scenario_data[$i]['installation_cost_nb_type_b'] = $data['installation_cost_nb_type_b'];
            $scenario_data[$i]['cost_nb_type_c'] = $data['cost_nb_type_c'];
            $scenario_data[$i]['installation_cost_nb_type_c'] = $data['installation_cost_nb_type_c'];

        //For dynamic json file
        $file_name = date('d-m-Y') . '_costs' . '.json'; //create dynamic json file name
        $saved_file = 'costs' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }
}

?>
