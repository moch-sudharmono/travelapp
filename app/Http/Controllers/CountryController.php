<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countries;

class CountryController extends Controller
{
    public function index()
    {
        return Countries::all();
    }
 
    public function show($id)
    {
        return Countries::find($id);
    }

    public function store(Request $request)
    {
        $countries = Countries::create($request->all());

        return response()->json($countries, 201);
    }

    public function update(Request $request, $id)
    {
        $countries = Countries::findOrFail($id);
        $countries->update($request->all());

        
        return response()->json($countries, 200);
    }

    public function delete(Request $request, $id)
    {
        $country = Countries::findOrFail($id);
        $country->delete();

        return response()->json(null, 204);
    }
}
