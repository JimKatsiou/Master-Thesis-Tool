<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gateway;
use Illuminate\Http\Request;

class GatewaysController extends Controller
{
    // all gateway
    public function index()
    {
        $gateways = Gateway::all()->toArray();
        return array_reverse($gateways);
    }

    // add gateway
    public function add(Request $request)
    {
        $gateway = new Gateway();

        $gateway->name = $request->name;
        $gateway->technology_id  = $request->technology_id ;
        if(isset($request->description)){
            $gateway->description = $request->description;
        } else {
            $gateway->description = null;
        }

        $gateway->save();

        return response()->json('The gateway successfully added');
    }

    // edit gateway
    public function edit($id)
    {
        $gateway = Gateway::find($id);
        return response()->json($gateway);
    }

    // update gateway
    public function update($id, Request $request)
    {
        $gateway = Gateway::find($id);
        $gateway->update($request->all());

        return response()->json('The gateway successfully updated');
    }

    // delete gateway
    public function delete($id)
    {
        $gateway = Gateway::find($id);
        $gateway->delete();

        return response()->json('The gateway successfully deleted');
    }
}
