<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Technologies;
use Illuminate\Http\Request;
use stdClass;

class TechnologyController extends Controller
{
    // all technologies
    public function index()
    {
        $technologies = Technologies::all()->toArray();
        return array_reverse($technologies);
    }

    // add technology
    public function add(Request $request)
    {
        $technology = new Technologies();

        $technology->name = $request->name;

        $technology->save();

        return response()->json('The technology successfully added');
    }

    // edit technology
    public function edit($id)
    {
        $technology = Technologies::find($id);
        return response()->json($technology);
    }

    // update technology
    public function update($id, Request $request)
    {
        $technology = Technologies::find($id);
        $technology->update($request->all());

        return response()->json('The technology successfully updated');
    }

    // delete technology
    public function delete($id)
    {
        $technology = Technologies::find($id);
        $technology->delete();

        return response()->json('The technology successfully deleted');
    }

    public function getAllTechnologies()
    {
        $response = new stdClass();

        $technoligies = Technologies::all();
        $i = 0;
        foreach ($technoligies as $technology)
        {
            $tech[$i]['name'] = $technology['name'];
            $i++;
        }
        return $tech;

        // $response->object = $technoligies;
        // dd($response);
        // return $response;
    }
}
