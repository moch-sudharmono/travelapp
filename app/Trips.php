<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    //
    protected $fillable = ['host_id', 'guest_id', 'trip_date', 'pick_up','pick_up_point', 'persons', 'estimated_time', 'real_time', 'city_id'];
    
    public function detail(){
        return $this->hasMany('App\TripDetails', 'trip_id');
    }

    public function host(){
        return $this->belongsTo('App\Hosts', 'host_id');
    }

    public function guest(){
        return $this->belongsTo('App\Guests', 'guest_id');
    }
}
