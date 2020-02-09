<?php

namespace App\Http\Controllers;

use App\Hosts;
use Illuminate\Http\Request;

class HostController extends Controller
{
    //

    public function index()
    {
        return Hosts::with(['user'])->get();
    }
 
    public function show($id)
    {
        return Hosts::with(['user','car'])->find($id);
    }

    public function store(Request $request)
    {
        $hosts = Hosts::create($request->all());

        return response()->json($hosts, 201);
    }

    public function update(Request $request, $id)
    {
        $hosts = Hosts::findOrFail($id);
        $hosts->update($request->all());

        return response()->json($hosts, 200);
    }

    
}
