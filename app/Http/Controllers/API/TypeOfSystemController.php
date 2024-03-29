<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TypeOfSystem;
use Illuminate\Http\Request;
use stdClass;

class TypeOfSystemController extends Controller
{

    // This function runs Matlab
    public function runMatlab()
    {
        dd('mpla');
        exec("matlab.exe");
    }

    // all type_of_system
    public function index()
    {
        $i = 0;
        $types_of_systems = TypeOfSystem::all()->toArray();
        foreach ($types_of_systems as $type_of_system) {
            $result_type_of_system[$i]['id'] = $type_of_system['id'];
            $result_type_of_system[$i]['name'] = $type_of_system['name'];
            $result_type_of_system[$i]['description'] = $type_of_system['description'];
            $date = strtotime($type_of_system['updated_at']);
            $updated_at = date('d/M/Y', $date);
            //$updated_at = date_format(,"Y/m/d");

            $result_type_of_system[$i]['updated_at'] = $updated_at;
            $i++;
        }
        return array_reverse($result_type_of_system);
    }

    // add type_of_system
    public function add(Request $request)
    {


        $type_of_system = new TypeOfSystem();

        $type_of_system->name = $request->name;
        if(isset($request->description)){
            $type_of_system->description = $request->description;
        } else {
            $type_of_system->description = null;
        }

        $type_of_system->save();

        return response()->json('The type of system successfully added');
    }

    // edit type_of_system
    public function edit($id)
    {
        $type_of_system = TypeOfSystem::find($id);
        return response()->json($type_of_system);
    }

    // update type_of_system
    public function update($id, Request $request)
    {
        $type_of_system = TypeOfSystem::find($id);
        $type_of_system->update($request->all());

        return response()->json('The type of system successfully updated');
    }

    // delete type_of_system
    public function delete($id)
    {
        $type_of_system = TypeOfSystem::find($id);
        $type_of_system->delete();

        return response()->json('The type of system successfully deleted');
    }

    public function getAllTypesOfSystems()
    {
        $response = new stdClass();

        $type_of_systems = TypeOfSystem::all();
        $i = 0;
        foreach ($type_of_systems as $system)
        {
            $tos[$i]['name'] = $system['name'];
            $i++;
        }
        return $tos;

        // $response->object = $technoligies;
        // dd($response);
        // return $response;
    }

    public function getSelectedSystem(Request $request)
    {
        $data = $request->post();
        dd($data);
    }

    
    public function getNumberOfTypeOfSystems()
    {
        $type_of_systems= TypeOfSystem::all();
        $type_of_systemsNumber = $type_of_systems->count();
        return response()->json($type_of_systemsNumber);
    }

}

?>
