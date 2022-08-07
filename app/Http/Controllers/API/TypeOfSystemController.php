<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TypeOfSystem;
use Illuminate\Http\Request;

class TypeOfSystemController extends Controller
{
    // all type_of_system
    public function index()
    {
        $types_of_system = TypeOfSystem::all()->toArray();
        return array_reverse($types_of_system);
    }

    // add type_of_system
    public function add(Request $request)
    {
        $type_of_system = new TypeOfSystem([
            'name' => $request->name,
            'description' => $request->description
        ]);
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

}

?>
