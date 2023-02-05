<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use stdClass;
use App\Models\Battery;

class BatteryContoller extends Controller{

    public function getAllBattaries()
    {
        $response = new stdClass();

        $battaries = Battery::all();
        $i = 0;
        foreach ($battaries as $battery)
        {
            $batt[$i]['name'] = $battery['name'];
            $i++;
        }
        return $batt;
    }

}

?>