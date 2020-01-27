<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    //
    protected $fillable = ['host_id', 'manufacture', 'model', 'color', 'mileage', 'capacity'];

    public function images(){
        return $this->hasMany('App\CarImages', 'car_id', 'id');
    }
}
