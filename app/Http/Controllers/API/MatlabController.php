<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FiveGSolutions;
use App\Models\LoraSolutions;
use App\Models\NbSolutions;
use App\Models\Battery;
use App\Models\SensorsCost;
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
        $five_g_scenario_data = FiveGSolutions::select('number_of_5g_sensors_type_a', 'number_of_5g_sensors_type_b', 'number_of_5g_sensors_type_c')
                                ->inRandomOrder()->limit(20)->get();

                                $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['numberOf5gSensorsTypeA'] = $data['number_of_5g_sensors_type_a'];
            $scenario_data[$i]['numberOf5gSensorsTypeB'] = $data['number_of_5g_sensors_type_b'];
            $scenario_data[$i]['numberOf5gSensorsTypeC'] = $data['number_of_5g_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_5g_scenario' . '.json'; //create dynamic json file name
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }

    public function get_data_Lora_wq()
    {
        $lora_scenario_data = LoraSolutions::select('number_of_lora_sensors_type_a', 'number_of_lora_sensors_type_b', 'number_of_lora_sensors_type_c')
                                ->inRandomOrder()->limit(20)->get();

                                $i = 0;
        foreach($lora_scenario_data as $data)
        {
            $scenario_data[$i]['numberOfLoraSensorsTypeA'] = $data['number_of_lora_sensors_type_a'];
            $scenario_data[$i]['numberOfLoraSensorsTypeB'] = $data['number_of_lora_sensors_type_b'];
            $scenario_data[$i]['numberOfLoraSensorsTypeC'] = $data['number_of_lora_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_lora_scenario' . '.json'; //create dynamic json file name
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }

    public function get_data_NB_wq()
    {
        $five_g_scenario_data = NbSolutions::select('number_of_nb_sensors_type_a', 'number_of_nb_sensors_type_b', 'number_of_nb_sensors_type_c')
                                ->inRandomOrder()->limit(20)->get();

        $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['numberOfNBSensorsTypeA'] = $data['number_of_nb_sensors_type_a'];
            $scenario_data[$i]['numberOfNBSensorsTypeB'] = $data['number_of_nb_sensors_type_b'];
            $scenario_data[$i]['numberOfNBSensorsTypeC'] = $data['number_of_nb_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_nb_scenario' . '.json'; //create dynamic json file name
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }

    public function get_data_battery()
    {
        $battery_scenario_data = Battery::select('name', 'capacity', 'consumption')->where('type', '=', '5G')
                                ->inRandomOrder()->limit(20)->get();
        // Η θα το εξελύξω και θα είναι με βάση τα names από τις παραπάνω
        $i = 0;
        foreach($battery_scenario_data as $data)
        {
            $scenario_data[$i]['numberOf5gSensorsTypeA'] = $data['number_of_5g_sensors_type_a'];
            $scenario_data[$i]['numberOf5gSensorsTypeB'] = $data['number_of_5g_sensors_type_b'];
            $scenario_data[$i]['numberOf5gSensorsTypeC'] = $data['number_of_5g_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_battery' . '.json'; //create dynamic json file name
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }

    public function get_data_cost()
    {
        $five_g_scenario_data = SensorsCost::select('number_of_5g_sensors_type_a', 'number_of_5g_sensors_type_b', 'number_of_5g_sensors_type_c')
                                ->inRandomOrder()->limit(20)->get();

                                $i = 0;
        foreach($five_g_scenario_data as $data)
        {
            $scenario_data[$i]['numberOf5gSensorsTypeA'] = $data['number_of_5g_sensors_type_a'];
            $scenario_data[$i]['numberOf5gSensorsTypeB'] = $data['number_of_5g_sensors_type_b'];
            $scenario_data[$i]['numberOf5gSensorsTypeC'] = $data['number_of_5g_sensors_type_c'];
            $i++;
        }

        //For dynamic json file
        $file_name = date('d-m-Y') . '_costs' . '.json'; //create dynamic json file name
        $s_data = json_encode($scenario_data);

        Storage::disk('local')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);
        Storage::disk('public')->put("MatlabCodes/Inputs-json/". $file_name,$s_data);

        return $file_name;
    }
}

?>
