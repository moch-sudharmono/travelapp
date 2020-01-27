<?php

namespace App\Http\Controllers;

use App\Guests;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index()
    {
        return Guests::with('user')->get();
    }
 
    public function show($id)
    {
        return Guests::find($id);
    }

    public function store(Request $request)
    {
        $guests = Guests::create($request->all());

        return response()->json($guests, 201);
    }

    public function update(Request $request, $id)
    {
        $guests = Guests::findOrFail($id);
        $guests->update($request->all());

        return response()->json($guests, 200);
    }
}
