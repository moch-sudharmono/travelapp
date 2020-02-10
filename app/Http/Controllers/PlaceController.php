<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Destinations;
use App\Trips;
use App\TripDetails;

class PlaceController extends Controller
{
    //
    public function searchPlace(Request $request, $search){
        #Google Places API
        $googleUrl  = 'https://maps.googleapis.com/maps/api/place/findplacefromtext/json';
        $params     = '?input='.$search.'&inputtype=textquery';
        $fields     = '&fields=photos,formatted_address,name,rating,opening_hours,geometry';
        $type       = '&type=tourist_attraction&language=en';
        $key        = '&key=AIzaSyBHExMmaxdj2lxVbtXbLrgX96S8oXnULxI';

        $mainUrl    = $googleUrl.$params.$fields.$type.$key;

        $client = new Client();
        $response = $client->request('GET', $mainUrl);

        return json_decode($response->getBody()->getContents(),true);        
    }

    public function setPlace(Request $request, $tripid){
        $raw    = $request->all();

        #Data Processing Destinations
        $long   = $raw['candidates'][0]['geometry']['location']['lng']; 
        $lat    = $raw['candidates'][0]['geometry']['location']['lat']; 
        $info   = $raw['candidates'][0]['formatted_address'];
        $name   = $raw['candidates'][0]['name'];
        $payload = ['name' => $name, 'info' => $info, 'latitude' => $lat, 'longitude' => $long, 'status' => 'active']; 
        $dest = Destinations::create($payload);

        #Destination set to Trip with Details
        $trippayload    = [
            'trip_id'       => $tripid,
            'destination'   => $dest['id']
        ];
        $detail = TripDetails::create($trippayload);

        return response()->json($detail, 201);
        
    }

    public function calculateFaresFromPickUp(Request $request,$id, $to){
        $startPoint = Trips::with(['detail.destinationData','host'])->find($id);
        $toPoint    = TripDetails::with(['destinationData'])->find($to);


        $googleUrl  = 'https://maps.googleapis.com/maps/api/distancematrix/json';
        $unit       = '?units=metric';
        $origin     = '&origins='.htmlentities($startPoint['pick_up']);
        $dest       = '&destinations='.htmlentities($toPoint['destinationData']['name']);
        $key        = '&key=AIzaSyBHExMmaxdj2lxVbtXbLrgX96S8oXnULxI';

        $mainUrl    = $googleUrl.$unit.$origin.$dest.$key;

        $client = new Client();
        $response = $client->request('GET', $mainUrl);

        $result = json_decode($response->getBody()->getContents(), true);
        
        #get fares
        $fares      = $startPoint['host']['fee'];
        $est_rate   = $fares * (($result['rows'][0]['elements'][0]['distance']['value'])/1000);
        $payload = [
            'distance'      => ($result['rows'][0]['elements'][0]['distance']['value']),
            'duration'      => ($result['rows'][0]['elements'][0]['duration']['value']),
            'estimated_rate'=> $est_rate
        ];
        $toPoint->update($payload);
        
        $startPoint->update(['estimate_fare' => $est_rate]);

        return response()->json($startPoint, 201);
    }

    public function calculateFares(Request $request,$id, $from, $to){
        $trip       = Trips::with(['detail.destinationData'])->find($id);
        $fromPoint  = TripDetails::with(['destinationData'])->find($from);
        $toPoint    = TripDetails::with(['destinationData'])->find($to);


        $googleUrl  = 'https://maps.googleapis.com/maps/api/distancematrix/json';
        $unit       = '?units=metric';
        $origin     = '&origins='.htmlentities($fromPoint['destinationData']['name']);
        $dest       = '&destinations='.htmlentities($toPoint['destinationData']['name']);
        $key        = '&key=AIzaSyBHExMmaxdj2lxVbtXbLrgX96S8oXnULxI';

        $mainUrl    = $googleUrl.$unit.$origin.$dest.$key;

        $client = new Client();
        $response = $client->request('GET', $mainUrl);

        $result = json_decode($response->getBody()->getContents(), true);

        $fares = $trip['host']['fee'];
        $estfare = $fares * ($result['rows'][0]['elements'][0]['distance']['value'] / 1000);
        $payload = [
            'distance'      => ($result['rows'][0]['elements'][0]['distance']['value']),
            'duration'      => ($result['rows'][0]['elements'][0]['duration']['value']),
            'estimated_rate'=> $estfare
        ];

        $toPoint->update($payload);

        $currFare = $trip['estimate_fare'];

        $totalFare = $currFare + $estfare;

        $trip->update(['estimate_fare' => $totalFare]);

        return response()->json($trip, 201);
    }
}
