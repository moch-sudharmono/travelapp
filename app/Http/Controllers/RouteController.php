<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    //
    public function routeMap(){
        $mainUrl = 'https://www.google.com/maps/dir/Bobobobo,+2+GRAHA+APIC,+Jl.+KH.+Wahid+Hasyim+No.154-156,+Daerah+Khusus+Ibukota+Jakarta+10250/Harmoni,+Central+Jakarta+City,+Jakarta/Stasiun+Gambir,+Jalan+Medan+Merdeka+Timur,+Gambir,+Central+Jakarta+City,+Jakarta/@-6.1760846,106.8176856,15.25z/data=!4m20!4m19!1m5!1m1!1s0x2e69f42490174231:0x70b23d60fd66c56d!2m2!1d106.821235!2d-6.1866!1m5!1m1!1s0x2e69f5d7a13c476f:0xda2ca6a026608b0d!2m2!1d106.82054!2d-6.16787!1m5!1m1!1s0x2e69f432b0d984e1:0x341c15623689f38a!2m2!1d106.8306527!2d-6.1767112!3e2';
        $client = new Client();
        $response = $client->request('GET', $mainUrl);

        return json_decode($response->getBody()->getContents(),true);      
    }
}
