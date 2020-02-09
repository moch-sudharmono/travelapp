<?php

namespace App\Http\Controllers;

use App\UserTypes;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    //
    public function index()
    {
        return UserTypes::all();
    }
 
    public function show($id)
    {
        return UserTypes::find($id);
    }

    public function store(Request $request)
    {
        $services = UserTypes::create($request->all());
        if($services){
            return response()->json($services, 201);
        }else{
            return response()->json(null,400);
        }
        
    }

    public function update(Request $request, $id)
    {
        $services = UserTypes::findOrFail($id);
        $services->update($request->all());

        return response()->json($services, 200);
    }

    public function delete(Request $request, $id)
    {
        $services = UserTypes::findOrFail($id);
        $services->delete();

        return response()->json(null, 204);
    }
}
