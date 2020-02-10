<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Trips;
class Hosts extends Model
{
    //
    protected $fillable = ['user_id', 'license_number', 'license_image', 'insurance_number', 'social_security', 'background_check',  'fee', 'status'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function car(){
        return $this->hasOne('App\Cars', 'host_id');
    }

    public static function findAvailableHost($date, $city){
        #Listing by City
        $results = User::where('city', $city)->get();
        $result = [];

        #Must add Available on date
        $bookedHost = [];
        $booked     = Trips::with(['host'])->where('trip_date', $date)->get();
        foreach($booked as $book){
            $bookedHost[] = $book['host_id'];
        }
        

        foreach($results as $users){
            #Host Available by City
            $data   = Hosts::with(['user','car'])->where('user_id', $users->id)->first();
            
            if($data && !in_array($data['id'], $bookedHost)){
                $result[] = $data;
            }
        }
        //

        return $result;
    }

    
}
