<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripDetails extends Model
{
    //
    protected $fillable = ['trip_id', 'destination', 'timer_id', 'service_id', 'distance', 'estimated_rate', 'real_rate'];

    public function trip(){
        return $this->belongsTo('App\Trips', 'trip_id');
    }

    public function destination(){
        return $this->hasOne('App\Destinations', 'id');
    }
}
