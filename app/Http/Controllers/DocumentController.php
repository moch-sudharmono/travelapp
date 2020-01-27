<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /*
    Route::get('host/{id}/documents', 'DocumentController@index');
    Route::get('host/{id}/document/{documentid}', 'DocumentController@show');
    Route::post('host/{id}/document', 'DocumentController@store');
    Route::put('host/{id}/document/{documentid}', 'DocumentController@update');
    */

    public function index($hostId)
    {
        return Documents::where('host_id',$hostId)->get();
    }

    public function show($id)
    {
        return Documents::find($id);
    }

    public function store(Request $request)
    {
        $docs = Documents::create($request->all());

        return response()->json($docs, 201);
    }

    public function delete(Request $request, $id)
    {
        $languages = Documents::findOrFail($id);
        $languages->delete();

        return response()->json(null, 204);
    }
}
