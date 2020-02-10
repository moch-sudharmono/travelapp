<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    //
    protected $fillable = ['name', 'info', 'latitude', 'longitude', 'status'];

    public function detail(){
        return $this->belongsTo('App\TripDetails', 'id');
    }

}
