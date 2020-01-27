<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripDetails extends Model
{
    //
    protected $fillable = ['trip_id', 'destination', 'timer_id', 'service_id', 'distance', 'estimated_rate', 'real_rate'];

}
