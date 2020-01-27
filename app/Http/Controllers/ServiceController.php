<?php

namespace App\Http\Controllers;

use App\Services;
use App\HostServices;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        return Services::all();
    }
 
    public function show($id)
    {
        return Services::find($id);
    }

    public function store(Request $request)
    {
        $services = Services::create($request->all());

        return response()->json($services, 201);
    }

    public function update(Request $request, $id)
    {
        $services = Services::findOrFail($id);
        $services->update($request->all());

        return response()->json($services, 200);
    }

    public function delete(Request $request, $id)
    {
        $services = Services::findOrFail($id);
        $services->delete();

        return response()->json(null, 204);
    }

    public function hostshow($id)
    {
        return HostServices::find($id);
    }

    public function hoststore(Request $request)
    {
        $services = HostServices::create($request->all());

        return response()->json($services, 201);
    }

    public function hostupdate(Request $request, $id)
    {
        $services = HostServices::findOrFail($id);
        $services->update($request->all());

        return response()->json($services, 200);
    }

    public function hostdelete(Request $request, $id)
    {
        $services = HostServices::findOrFail($id);
        $services->delete();

        return response()->json(null, 204);
    }
}
