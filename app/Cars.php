<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    //
    protected $fillable = ['host_id', 'car_type', 'manufacture', 'model', 'color', 'mileage', 'capacity','features', 'image'];


    // public function images(){
    //     return $this->hasMany('App\CarImages', 'car_id', 'id');
    // }

    public function host(){
        return $this->belongsTo('App\Hosts', 'host_id');
    }
}
