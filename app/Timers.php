<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timers extends Model
{
    //
    protected $fillable = ['trip_detail_id', 'number', 'start', 'stop', 'status'];

}
