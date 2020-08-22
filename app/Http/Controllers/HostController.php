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
        return Hosts::with(['user'])->find($id);
    }

    public function store(Request $request)
    {
        $host = Hosts::find($request->id);

        if($host){
            $host->update($request->all());    
        }else{
            $host = Hosts::create($request->all());
        }

        return response()->json($host, 201);
    }

    public function update(Request $request, $id)
    {
        $hosts = Hosts::findOrFail($id);
        $hosts->update($request->all());

        return response()->json($hosts, 200);
    }

    
}
