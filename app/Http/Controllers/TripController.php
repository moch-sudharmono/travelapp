<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Hosts;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function show($id)
    {
        return Trips::with(['host.user','guest.user','detail.destinationData'])->find($id);
    }

    public function store(Request $request)
    {
        $trip = Trips::create($request->all());

        $hosts = Hosts::findAvailableHost($trip->trip_date,$trip->city_id);

        return response()->json($hosts, 201);
    }

    public function update(Request $request, $id)
    {
        $trip = Trips::findOrFail($id);
        $trip->update($request->all());

        return response()->json($trip, 200);
    }
}
