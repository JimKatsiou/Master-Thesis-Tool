<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FiveGSolutions;
use App\Models\LoraSolutions;
use App\Models\NbSolutions;
use App\Models\Battery;
use App\Models\Gateway;
use App\Models\InputsHistory;
use App\Models\Result;
use App\Models\ResultGA;
use App\Models\ResultsConfig;
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

    public function getData5gWQ(Request $request)
    {
        $data = $request->post();
        $five_g_scenario_data = FiveGSolutions::where('type_of_system', $data['system'])->inRandomOrder()->limit(20)->get();
        $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['five_g_sensors_type_a'] = $data['five_g_sensors_type_a'];
            $scenario_data[$i]['five_g_sensors_type_b'] = $data['five_g_sensors_type_b'];
            $scenario_data[$i]['five_g_sensors_type_c'] = $data['five_g_sensors_type_c'];
            $scenario_data[$i]['numberOf5gSensorsTypeA'] = $data['number_of_5g_sensors_type_a'];
            $scenario_data[$i]['numberOf5gSensorsTypeB'] = $data['number_of_5g_sensors_type_b'];
            $scenario_data[$i]['numberOf5gSensorsTypeC'] = $data['number_of_5g_sensors_type_c'];

            // $scenario_data[$i]['gateways_type_a'] = $data['gateways_type_a'];
            // $scenario_data[$i]['gateways_type_b'] = $data['gateways_type_b'];
            // $scenario_data[$i]['numberOfGatewaysTypeA'] = $data['number_of_5g_gateways_type_a'];
            // $scenario_data[$i]['numberOfGatewaysTypeB'] = $data['number_of_5g_gateways_type_b'];
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
        $lora_scenario_data = LoraSolutions::where('type_of_system', $data['system'])->inRandomOrder()->limit(20)->get();
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

    public function get_data_NB_wq(Request $request)
    {
        $data = $request->post();
        $five_g_scenario_data = NbSolutions::where('type_of_system', $data['system'])->inRandomOrder()->limit(20)->get();
        $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['nb_sensors_type_a'] = $data['nb_sensors_type_a'];
            $scenario_data[$i]['nb_sensors_type_b'] = $data['nb_sensors_type_b'];
            $scenario_data[$i]['nb_sensors_type_c'] = $data['nb_sensors_type_c'];
            $scenario_data[$i]['numberOfNBSensorsTypeA'] = $data['number_of_nb_sensors_type_a'];
            $scenario_data[$i]['numberOfNBSensorsTypeB'] = $data['number_of_nb_sensors_type_b'];
            $scenario_data[$i]['numberOfNBSensorsTypeC'] = $data['number_of_nb_sensors_type_c'];

            // $scenario_data[$i]['gateways_type_a'] = $data['gateways_type_a'];
            // $scenario_data[$i]['gateways_type_b'] = $data['gateways_type_b'];
            // $scenario_data[$i]['numberOfGatewaysTypeA'] = $data['number_of_nb_gateways_type_a'];
            // $scenario_data[$i]['numberOfGatewaysTypeB'] = $data['number_of_nb_gateways_type_b'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_nb_scenario' . '.json'; //create dynamic json file name
        $saved_file = 'nb_scenario' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

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
            $batteryA = Battery::where('id', $batteryA->battery_id)->first();
            $batteryB = Sensor::select('battery_id')->where('name', '=', $fiveg['five_g_sensors_type_b'])->first();
            $batteryB = Battery::where('id', $batteryB->battery_id)->first();
            $batteryC = Sensor::select('battery_id')->where('name', '=', $fiveg['five_g_sensors_type_c'])->first();
            $batteryC = Battery::where('id', $batteryC->battery_id)->first();

            // $batteryGA = Gateway::select('battery_id')->where('name', '=', $fiveg['gateways_type_a'])->first();
            // $batteryGB = Gateway::select('battery_id')->where('name', '=', $fiveg['gateways_type_b'])->first();
            // $batteryGA = Battery::where('id', $batteryGA->battery_id)->first();
            // $batteryGB = Battery::where('id', $batteryGB->battery_id)->first();

            $batteries[$i]['battery_capacity_5g_type_a'] = $batteryA->capacity;
            $batteries[$i]['battery_consumption_5g_type_a'] = $batteryA->consumption;

            $batteries[$i]['battery_capacity_5g_type_b'] = $batteryB->capacity;
            $batteries[$i]['battery_consumption_5g_type_b'] = $batteryB->capacity;

            $batteries[$i]['battery_capacity_5g_type_c'] = $batteryC->capacity;
            $batteries[$i]['battery_consumption_5g_type_c'] = $batteryC->capacity;

            // $batteries[$i]['battery_capacity_5g_gateway_type_a'] = $batteryGA->capacity;
            // $batteries[$i]['battery_consumption_5g_type_a'] = $batteryGA->capacity;

            // $batteries[$i]['battery_capacity_5g_gateway_type_b'] = $batteryGB->capacity;
            // $batteries[$i]['battery_consumption_5g_type_b'] = $batteryGB->capacity;
            $i++;
        }

        $i = 0;
        foreach ($loraSolutions as $lora)
        {
            $batteryA = Sensor::select('battery_id')->where('name', '=', $lora['lora_sensors_type_a'])->first();
            $batteryA = Battery::where('id', $batteryA->battery_id)->first();
            $batteryB = Sensor::select('battery_id')->where('name', '=', $lora['lora_sensors_type_b'])->first();
            $batteryB = Battery::where('id', $batteryB->battery_id)->first();
            $batteryC = Sensor::select('battery_id')->where('name', '=', $lora['lora_sensors_type_c'])->first();
            $batteryC = Battery::where('id', $batteryC->battery_id)->first();

            $batteryGA = Gateway::select('battery_id')->where('name', '=', $lora['gateways_type_a'])->first();
            $batteryGB = Gateway::select('battery_id')->where('name', '=', $lora['gateways_type_b'])->first();
            $batteryGA = Battery::where('id', $batteryGA->battery_id)->first();
            $batteryGB = Battery::where('id', $batteryGB->battery_id)->first();

            $batteries[$i]['battery_capacity_lora_type_a'] = $batteryA->capacity;
            $batteries[$i]['battery_consumption_lora_type_a'] = $batteryA->consumption;

            $batteries[$i]['battery_capacity_lora_type_b'] = $batteryB->capacity;
            $batteries[$i]['battery_consumption_lora_type_b'] = $batteryB->capacity;

            $batteries[$i]['battery_capacity_lora_type_c'] = $batteryC->capacity;
            $batteries[$i]['battery_consumption_lora_type_c'] = $batteryC->capacity;

            $batteries[$i]['battery_capacity_lora_gateway_type_a'] = $batteryGA->capacity;
            $batteries[$i]['battery_consumption_lora_gateway_type_a'] = $batteryGA->capacity;

            $batteries[$i]['battery_capacity_lora_gateway_type_b'] = $batteryGB->capacity;
            $batteries[$i]['battery_consumption_lora_gateway_type_b'] = $batteryGB->capacity;
            $i++;
        }

        $i = 0;
        foreach ($nbSolutions as $nb)
        {
            $batteryA = Sensor::select('battery_id')->where('name', '=', $nb['nb_sensors_type_a'])->first();
            $batteryA = Battery::where('id', $batteryA->battery_id)->first();
            $batteryB = Sensor::select('battery_id')->where('name', '=', $nb['nb_sensors_type_b'])->first();
            $batteryB = Battery::where('id', $batteryB->battery_id)->first();
            $batteryC = Sensor::select('battery_id')->where('name', '=', $nb['nb_sensors_type_c'])->first();
            $batteryC = Battery::where('id', $batteryC->battery_id)->first();

            // $batteryGA = Gateway::select('battery_id')->where('name', '=', $nb['gateways_type_a'])->first();
            // $batteryGB = Gateway::select('battery_id')->where('name', '=', $nb['gateways_type_b'])->first();
            // $batteryGA = Battery::where('id', $batteryGA->battery_id)->first();
            // $batteryGB = Battery::where('id', $batteryGB->battery_id)->first();

            $batteries[$i]['battery_capacity_nb_type_a'] = $batteryA->capacity;
            $batteries[$i]['battery_consumption_nb_type_a'] = $batteryA->consumption;

            $batteries[$i]['battery_capacity_nb_type_b'] = $batteryB->capacity;
            $batteries[$i]['battery_consumption_nb_type_b'] = $batteryB->capacity;

            $batteries[$i]['battery_capacity_nb_type_c'] = $batteryC->capacity;
            $batteries[$i]['battery_consumption_nb_type_c'] = $batteryC->capacity;

            // $batteries[$i]['battery_capacity_nb_gateway_type_a'] = $batteryGA->capacity;
            // $batteries[$i]['battery_consumption_nb_type_a'] = $batteryGA->capacity;

            // $batteries[$i]['battery_capacity_nb_gateway_type_b'] = $batteryGB->capacity;
            // $batteries[$i]['battery_consumption_nb_type_b'] = $batteryGB->capacity;
            $i++;
        }
        $scenario_data = $batteries;

        //For dynamic json file
        $file_name = date('d-m-Y') . '_battery' . '.json'; //create dynamic json file name
        $saved_file = 'battery' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

        $response = new stdClass();
        $response->file_name = $file_name;
        $response->s_data = $s_data;
        $response->scenario_data = $scenario_data;
        return $response;
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

            $costs[$i]['cost_5g_type_a'] = $sensorA['cost'];
            $costs[$i]['installation_cost_5g_type_a'] = $sensorA['installation_cost'];

            $sensorB = Sensor::where('name', '=', $fiveg['five_g_sensors_type_b'])->first();
            $costs[$i]['cost_5g_type_b'] = $sensorB['cost'];
            $costs[$i]['installation_cost_5g_type_b'] = $sensorB['installation_cost'];

            $sensorC = Sensor::where('name', '=', $fiveg['five_g_sensors_type_c'])->first();
            $costs[$i]['cost_5g_type_c'] = $sensorC['cost'];
            $costs[$i]['installation_cost_5g_type_c'] = $sensorC['installation_cost'];

            // $sensorA = Gateway::where('name', '=', $fiveg['five_g_gateways_type_a'])->first();
            // $sensorA = Gateway::where('name', '=', $fiveg['five_g_gateways_type_b'])->first();
            // $sensorA = Gateway::where('name', '=', $fiveg['five_g_gateways_type_c'])->first();

            // $costs[$i]['cost_5g_gateway_type_a'] = $sensorC['cost'];
            // $costs[$i]['installation_cost_5g_cost_type_a'] = $sensorC['installation_cost'];
            // $costs[$i]['cost_5g_gateway_type_b'] = $sensorC['cost'];
            // $costs[$i]['installation_cost_5g_cost_type_b'] = $sensorC['installation_cost'];
            // $costs[$i]['cost_5g_gateway_type_c'] = $sensorC['cost'];
            // $costs[$i]['installation_cost_5g_cost_type_c'] = $sensorC['installation_cost'];
            $i++;
        }

        $i = 0;
        foreach ($loraSolutions as $lora)
        {
            $sensorA = Sensor::where('name', '=', $lora['lora_sensors_type_a'])->first();
            $costs[$i]['cost_lora_type_a'] = $sensorA['cost'];
            $costs[$i]['installation_cost_lora_type_a'] = $sensorA['installation_cost'];

            $sensorB = Sensor::where('name', '=', $lora['lora_sensors_type_b'])->first();
            $costs[$i]['cost_lora_type_b'] = $sensorB['cost'];
            $costs[$i]['installation_cost_lora_type_b'] = $sensorB['installation_cost'];

            $sensorC = Sensor::where('name', '=', $lora['lora_sensors_type_c'])->first();
            $costs[$i]['cost_lora_type_c'] = $sensorC['cost'];
            $costs[$i]['installation_cost_lora_type_c'] = $sensorC['installation_cost'];

            $sensorC = Gateway::where('name', '=', $lora['gateways_type_a'])->first();
            $costs[$i]['cost_lora_gateway_type_a'] = $sensorC['cost'];
            $costs[$i]['installation_lora_gateway_type_a'] = $sensorC['installation_cost'];

            $sensorC = Gateway::where('name', '=', $lora['gateways_type_b'])->first();
            $costs[$i]['cost_lora_gateway_type_b'] = $sensorC['cost'];
            $costs[$i]['installation_lora_gateway_type_b'] = $sensorC['installation_cost'];
            $i ++;
        }

        $i = 0;
        foreach ($nbSolutions as $nb)
        {
            $sensorA = Sensor::where('name', '=', $nb['nb_sensors_type_a'])->first();
            $costs[$i]['cost_nb_type_a'] = $sensorA['cost'];
            $costs[$i]['installation_cost_nb_type_a'] = $sensorA['installation_cost'];

            $sensorB = Sensor::where('name', '=', $nb['nb_sensors_type_b'])->first();
            $costs[$i]['cost_nb_type_b'] = $sensorB['cost'];
            $costs[$i]['installation_cost_nb_type_b'] = $sensorB['installation_cost'];

            $sensorC = Sensor::where('name', '=', $nb['nb_sensors_type_c'])->first();
            $costs[$i]['cost_nb_type_c'] = $sensorC['cost'];
            $costs[$i]['installation_cost_nb_type_c'] = $sensorC['installation_cost'];

            // $sensorC = Gateway::where('name', '=', $nb['nb_gateways_type_a'])->first();
            // $costs[$i]['cost_lora_gateway_type_a'] = $sensorC['cost'];
            // $costs[$i]['installation_lora_gateway_type_a'] = $sensorC['installation_cost'];
            // $sensorC = Gateway::where('name', '=', $nb['nb_gateways_type_b'])->first();
            // $costs[$i]['cost_lora_gateway_type_b'] = $sensorC['cost'];
            // $costs[$i]['installation_lora_gateway_type_b'] = $sensorC['installation_cost'];
            $i ++;
        }
        $scenario_data = $costs;

        //For dynamic json file
        $file_name = date('d-m-Y') . '_costs' . '.json'; //create dynamic json file name
        $saved_file = 'costs' . '.json';
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $saved_file,$s_data);

        $response = new stdClass();
        $response->file_name = $file_name;
        $response->s_data = $s_data;
        $response->scenario_data = $scenario_data;
        return $response;
    }

    public function fetch_results(Request $request)
    {
        $system = $request->post();    

        // COST SIMULATION JSON FILES
        $fiveG_scenario = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Inputs-json/5g_scenario.json"), true);
        $lora_scenario = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Inputs-json/lora_scenario.json"), true);
        $nbIoT_scenario = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Inputs-json/nb_scenario.json"), true);
        // PANE KANEI PINAKA POY THA T POTHIKEUEI KETEUTHIAN GIA ISTORIKOTITA KAI THA PERNEI KAI TO NOYMERO TO RESULT
        // dd($fiveG_scenario,$lora_scenario,$nbIoT_scenario);

        $cost_effective_5g_solutions_by_cost = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-5g-solutions_by_cost.json"), true);
        $cheap_5g_solutions = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-5g-solutions_by_solution.json"), true);

        $cost_effective_lora_solutions_by_cost = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-lora-solutions_by_cost.json"), true);
        $cost_effective_lora_solutions_by_solution = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-lora-solutions_by_solution.json"), true);
        
        $cost_effective_nb_solutions_by_cost = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-nb-solutions_by_cost.json"), true);
        $cost_effective_nb_solutions_by_solution = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/cost-effective-nb-solutions_by_solution.json"), true);

        $merged_5g_cost = array_merge($cost_effective_5g_solutions_by_cost, $cheap_5g_solutions);
        $merged_lora_cost = array_merge($cost_effective_lora_solutions_by_cost, $cost_effective_lora_solutions_by_solution);
        $merged_nb_iot_cost = array_merge($cost_effective_nb_solutions_by_cost, $cost_effective_nb_solutions_by_solution);      

        // Results
        $results_config = ResultsConfig::first();
        if($results_config != null)
        {
            $last_number = $results_config->last_simulation_nubmer + 1;
        } else {
            $results_config = new ResultsConfig();
            $last_number = 1;
        }

        $merge_history = array_merge($fiveG_scenario, $lora_scenario, $nbIoT_scenario);
        //dd($merge_history);

        //History inputs
        $length = count($fiveG_scenario);
        for ($count = 0;  $count < $length; $count++)
        {
            $history = new InputsHistory();

            $history->simulation_nubmer = $last_number;
            //$new_results->simulation_name = "Cheapest solution based on cost";
            $history->technology = '5G';
            $history->type_of_system = $system['system'];
            $history->execution_date = date('d-m-Y');

            $history->five_g_sensors_type_a =  $fiveG_scenario[$count]['five_g_sensors_type_a'];
            $history->five_g_sensors_type_b = $fiveG_scenario[$count]['five_g_sensors_type_b'];
            $history->five_g_sensors_type_c = $fiveG_scenario[$count]['five_g_sensors_type_c'];
            $history->numberOf5gSensorsTypeA = $fiveG_scenario[$count]['numberOf5gSensorsTypeA'];
            $history->numberOf5gSensorsTypeB = $fiveG_scenario[$count]['numberOf5gSensorsTypeB'];
            $history->numberOf5gSensorsTypeC = $fiveG_scenario[$count]['numberOf5gSensorsTypeC'];
    
            $history->save();
            $results_config->last_simulation_nubmer = $history->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        $length = count($lora_scenario);
        for ($count = 0;  $count < $length; $count++)
        {
            $history = new InputsHistory();

            $history->simulation_nubmer = $last_number;
            //$new_results->simulation_name = "Cheapest solution based on cost";
            $history->technology = 'LoRa';
            $history->type_of_system = $system['system'];
            $history->execution_date = date('d-m-Y');

            $history->lora_sensors_type_a =  $lora_scenario[$count]['lora_sensors_type_a'];
            $history->lora_sensors_type_b = $lora_scenario[$count]['lora_sensors_type_b'];
            $history->lora_sensors_type_c = $lora_scenario[$count]['lora_sensors_type_c'];
            $history->numberOfLoraSensorsTypeA = $lora_scenario[$count]['numberOfLoraSensorsTypeA'];
            $history->numberOfLoraSensorsTypeB = $lora_scenario[$count]['numberOfLoraSensorsTypeB'];
            $history->numberOfLoraSensorsTypeC = $lora_scenario[$count]['numberOfLoraSensorsTypeC'];
            $history->gateways_type_a = $lora_scenario[$count]['gateways_type_a'];
            $history->gateways_type_b = $lora_scenario[$count]['gateways_type_b'];
            $history->numberOfGatewaysTypeA = $lora_scenario[$count]['numberOfGatewaysTypeA'];
            $history->numberOfGatewaysTypeB = $lora_scenario[$count]['numberOfGatewaysTypeB'];
   
            $history->save();
            $results_config->last_simulation_nubmer = $history->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        $length = count($nbIoT_scenario);
        for ($count = 0;  $count < $length; $count++)
        {
            $history = new InputsHistory();

            $history->simulation_nubmer = $last_number;
            //$new_results->simulation_name = "Cheapest solution based on cost";
            $history->technology = 'NB-IoT';
            $history->type_of_system = $system['system'];
            $history->execution_date = date('d-m-Y');

            $history->nb_sensors_type_a =  $nbIoT_scenario[$count]['nb_sensors_type_a'];
            $history->nb_sensors_type_b = $nbIoT_scenario[$count]['nb_sensors_type_b'];
            $history->nb_sensors_type_c = $nbIoT_scenario[$count]['nb_sensors_type_c'];
            $history->numberOfNBSensorsTypeA = $nbIoT_scenario[$count]['numberOfNBSensorsTypeA'];
            $history->numberOfNBSensorsTypeB = $nbIoT_scenario[$count]['numberOfNBSensorsTypeB'];
            $history->numberOfNBSensorsTypeC = $nbIoT_scenario[$count]['numberOfNBSensorsTypeC'];
   
            $history->save();
            $results_config->last_simulation_nubmer = $history->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        //5G
        $length = count($merged_5g_cost['cheapest_5g_solutionTableCost']);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new Result();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = "Cheapest solution based on cost";
            $new_results->technology = '5G';
            $new_results->type_of_system = $system['system'];
            $new_results->simulation_perpuse = 'Chepest-by-cost';
            $new_results->execution_date = date('d-m-Y');
            
            $new_results->cheapest_5g_solutionTableCost = $merged_5g_cost['cheapest_5g_solutionTableCost'][$count];
            $new_results->cheapest_5g_solutionTable = $merged_5g_cost['cheapest_5g_solutionTable'][$count];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;

        }

        //Lora
        $length = count($merged_lora_cost['cheapest_lora_solutionTableCost']);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new Result();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = 'Cheapest solution based on cost';
            $new_results->technology = 'LoRa';
            $new_results->type_of_system = $system['system'];
            $new_results->simulation_perpuse = 'Chepest-by-cost';
            $new_results->execution_date = date('d-m-Y');

            $new_results->cheapest_lora_solutionTableCost = $merged_lora_cost['cheapest_lora_solutionTableCost'][$count];
            $new_results->cheapest_lora_solutionTable = $merged_lora_cost['cheapest_lora_solutionTable'][$count];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        //NB IoT
        $length = count($merged_nb_iot_cost['cheapest_nb_solutionTableCost']);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new Result();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = 'Cheapest solution based on cost';
            $new_results->technology = 'NB-IoT';
            $new_results->type_of_system = $system['system'];
            $new_results->simulation_perpuse = 'Chepest-by-cost';
            $new_results->execution_date = date('d-m-Y');

            $new_results->cheapest_nb_solutionTableCost = $merged_nb_iot_cost['cheapest_nb_solutionTableCost'][$count];
            $new_results->cheapest_nb_solutionTable = $merged_nb_iot_cost['cheapest_nb_solutionTable'][$count];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        // Battery - Greedy Algorithm

        // BATTERY EFFECTIVE SIMULATION JSON FILES
        $battery_effective_5g_solutions_by_battery_life = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-5g-solutions_by_battery_life.json"), true);
        $battery_effective_5g_solutions_by_solution = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-5g-solutions_by_solution.json"), true);

        $battery_effective_nb_solutions_by_battery_life = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-nb-solutions_by_battery_life.json"), true);
        $battery_effective_nb_solutions_by_solution = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-nb-solutions_by_solution.json"), true);

        $battery_effective_lora_solutions_by_battery_life_sensors = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-lora-solutions_by_battery_life_sensors.json"), true);
        $battery_effective_lora_solutions_by_battery_life_gateways = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-lora-solutions_by_battery_life_gateways.json"), true);
        $battery_effective_lora_solutions_by_solution = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-lora-solutions_by_solution.json"), true);
        $battery_effective_lora_solutions_by_solution_gateways = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/Greedy/battery-effective-lora-solutions_by_solution_gateways.json"), true);
        
        $merged_5g_battery = array_merge($battery_effective_5g_solutions_by_battery_life, $battery_effective_5g_solutions_by_solution);
        $merged_nb_battery = array_merge($battery_effective_nb_solutions_by_battery_life, $battery_effective_nb_solutions_by_solution);
        $merged_lora_battery = array_merge($battery_effective_lora_solutions_by_battery_life_sensors, $battery_effective_lora_solutions_by_battery_life_gateways,$battery_effective_lora_solutions_by_solution,$battery_effective_lora_solutions_by_solution_gateways);
        $merged_lora_battery_sensors = array_merge($battery_effective_lora_solutions_by_battery_life_sensors, $battery_effective_lora_solutions_by_solution);
        $merged_lora_battery_gateways = array_merge($battery_effective_lora_solutions_by_battery_life_gateways, $battery_effective_lora_solutions_by_solution_gateways);

        // 5G
        $length = count($merged_5g_battery['best_5g_solutionTableBL']);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new Result();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = "Efficient solution based on battery life";
            $new_results->technology = '5G';
            $new_results->type_of_system = $system['system'];
            $new_results->simulation_perpuse = 'Best battery performance';
            $new_results->execution_date = date('d-m-Y');
            
            $new_results->best_5g_solutionTableBL = $merged_5g_battery['best_5g_solutionTableBL'][$count];
            $new_results->best_5g_solutionTable = $merged_5g_battery['best_5g_solutionTable'][$count];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        //Lora - Bttery
        $length = count($merged_lora_cost['cheapest_lora_solutionTableCost']);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new Result();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = 'Cheapest solution based on cost';
            $new_results->technology = 'LoRa';
            $new_results->type_of_system = $system['system'];
            $new_results->simulation_perpuse = 'Best battery performance';
            $new_results->execution_date = date('d-m-Y');

            $new_results->cheapest_lora_solutionTableCost = $merged_lora_cost['cheapest_lora_solutionTableCost'][$count];
            $new_results->cheapest_lora_solutionTable = $merged_lora_cost['cheapest_lora_solutionTable'][$count];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

         // NB IoT
         $length = count($merged_nb_battery['best_nb_solutionTableBL']);
         for ($count = 0;  $count < $length; $count++)
         {
             $new_results = new Result();
 
             $new_results->simulation_nubmer = $last_number;
             $new_results->simulation_name = 'Cheapest solution based on cost';
             $new_results->technology = 'NB-IoT';
             $new_results->type_of_system = $system['system'];
             $new_results->simulation_perpuse = 'Best battery performance';
             $new_results->execution_date = date('d-m-Y');
 
             $new_results->best_nb_solutionTableBL = $merged_nb_battery['best_nb_solutionTableBL'][$count];
             $new_results->best_nb_solutionTable = $merged_nb_battery['best_nb_solutionTable'][$count];
 
             $new_results->save();
             $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
             $results_config->save();
             $last_number = $results_config->last_simulation_nubmer;
         }


        // Genetic - Algorithms

        // COST SIMULATION JSON FILES
        $ga_most_effective_5g_solutions = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/GA/GA-cost-effective-5g-solutions.json"), true);
        $ga_most_effective_lora_solutions = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/GA/GA-cost-effective-lora-solutions.json"), true);
        $ga_most_effective_nb_solutions = json_decode(file_get_contents(storage_path() . "/app/public/MatlabCodes/Results/GA/GA-cost-effective-NB-solutions.json"), true);

        // 5G
        $length = count([$ga_most_effective_5g_solutions]);
        for ($count = 0;  $count < $length; $count++)
        {
            $check_if_resultt_exist = ResultGA::where('sensor_5g_a', $ga_most_effective_5g_solutions[$count][0])
            ->where('sensor_5g_a', $ga_most_effective_5g_solutions[$count][0])
            ->where('sensor_5g_b', $ga_most_effective_5g_solutions[$count][0])
            ->where('sensor_5g_c', $ga_most_effective_5g_solutions[$count][0])
            ->first();

            $new_results = new ResultGA();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = "Efficient solutions, response from algorith";
            $new_results->technology = '5G';
            $new_results->type_of_system = $system['system'];
            $new_results->execution_date = date('d-m-Y');
            
            $new_results->sensor_5g_a = $ga_most_effective_5g_solutions[$count][0];
            $new_results->sensor_5g_b = $ga_most_effective_5g_solutions[$count][1];
            $new_results->sensor_5g_c = $ga_most_effective_5g_solutions[$count][2];

            $new_results->solution_cost_nb = $ga_most_effective_5g_solutions[$count][3];
            $new_results->solution_battery_life_nb = $ga_most_effective_5g_solutions[$count][4];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        // LoRa
        $length = count([$ga_most_effective_lora_solutions]);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new ResultGA();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = "Efficient solutions, response from algorith";
            $new_results->technology = 'LoRa';
            $new_results->type_of_system = $system['system'];
            $new_results->execution_date = date('d-m-Y');
            
            $new_results->sensor_lora_a = $ga_most_effective_lora_solutions[$count][0];
            $new_results->sensor_lora_b = $ga_most_effective_lora_solutions[$count][1];
            $new_results->sensor_lora_c = $ga_most_effective_lora_solutions[$count][2];

            $new_results->solution_cost_lora = $ga_most_effective_lora_solutions[$count][3];
            $new_results->solution_battery_life_lora = $ga_most_effective_lora_solutions[$count][4];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }

        // NB-IoT
        $length = count([$ga_most_effective_nb_solutions]);
        for ($count = 0;  $count < $length; $count++)
        {
            $new_results = new ResultGA();

            $new_results->simulation_nubmer = $last_number;
            $new_results->simulation_name = "Efficient solutions, response from gentic algorith";
            $new_results->technology = 'NB-IoT';
            $new_results->type_of_system = $system['system'];
            $new_results->execution_date = date('d-m-Y');
            
            $new_results->sensor_nb_a = $ga_most_effective_nb_solutions[$count][0];
            $new_results->sensor_nb_b = $ga_most_effective_nb_solutions[$count][1];
            $new_results->sensor_nb_c = $ga_most_effective_nb_solutions[$count][2];

            $new_results->solution_cost_nb = $ga_most_effective_nb_solutions[$count][3];
            $new_results->solution_battery_life_nb = $ga_most_effective_nb_solutions[$count][4];

            $new_results->save();
            $results_config->last_simulation_nubmer = $new_results->simulation_nubmer;
            $results_config->save();
            $last_number = $results_config->last_simulation_nubmer;
        }
    }
}
?>