<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripPayments extends Model
{
    //
    protected $fillable = ['trip_id', 'status', 'info'];

}
