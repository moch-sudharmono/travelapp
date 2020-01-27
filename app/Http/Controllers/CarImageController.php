<?php

namespace App\Http\Controllers;

use App\Cars;
use App\CarImages;
use Illuminate\Http\Request;

class CarImageController extends Controller
{
    public function index($carid)
    {
        return CarImages::find($carid);
    }
    
    public function show($id)
    {
        return CarImages::find($id);
    }

    public function store(Request $request)
    {
        $image = CarImages::create($request->all());

        return response()->json($image, 201);
    }

    public function delete(Request $request, $id)
    {
        $image = CarImages::findOrFail($id);
        $image->delete();

        return response()->json(null, 204);
    }
}
