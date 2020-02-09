<?php

namespace App\Http\Controllers;

use App\Cars;
use Illuminate\Http\Request;

class CarController extends Controller
{
    
    public function show($id)
    {
        return Cars::find($id);
    }

    public function store(Request $request)
    {
        $car = Cars::create($request->all());        
        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $guests = Cars::findOrFail($id);
        $guests->update($request->all());

        return response()->json($guests, 200);
    }
}
