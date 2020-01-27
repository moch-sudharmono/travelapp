<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    //
    protected $fillable = ['host_id', 'guest_id', 'trip_date', 'pick_up', 'persons', 'estimated_time', 'real_time', 'city_id'];
    
}
