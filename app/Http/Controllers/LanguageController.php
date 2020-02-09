<?php

namespace App\Http\Controllers;

use App\Languages;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    //
    public function index()
    {
        return Languages::all();
    }
 
    public function show($id)
    {
        return Languages::find($id);
    }

    public function store(Request $request)
    {
        $languages = Languages::create($request->all());

        return response()->json($languages, 201);
    }

    public function update(Request $request, $id)
    {
        $languages = Languages::findOrFail($id);
        $languages->update($request->all());

        return response()->json($languages, 200);
    }

    public function delete(Request $request, $id)
    {
        $languages = Languages::findOrFail($id);
        $languages->delete();

        return response()->json(null, 204);
    }

    #Host Menu

    public function hostindex($hostId)
    {
        return HostLanguages::where('host_id', $hostId)->get();
    }

    public function hostshow($id)
    {
        return HostLanguages::find($id);
    }

    public function hoststore(Request $request)
    {
        $languages = HostLanguages::create($request->all());

        return response()->json($languages, 201);
    }

    public function hostdelete(Request $request, $id)
    {
        $languages = HostLanguages::findOrFail($id);
        $languages->delete();

        return response()->json(null, 204);
    }
}
