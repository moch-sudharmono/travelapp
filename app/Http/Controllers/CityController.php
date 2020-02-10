<?php

namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //
    public function index()
    {
        return Cities::with(['country'])->get();
    }
 
    public function show($id)
    {
        return Cities::with(['country'])->find($id);
    }

    public function store(Request $request)
    {
        $cities = Cities::create($request->all());

        return response()->json($cities, 201);
    }

    public function update(Request $request, $id)
    {
        $cities = Cities::findOrFail($id);
        $cities->update($request->all());

        return response()->json($cities, 200);
    }

    public function delete(Request $request, $id)
    {
        $cities = Cities::findOrFail($id);
        $cities->delete();

        return response()->json(null, 204);
    }
}
