<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImages extends Model
{
    //
    protected $fillable = ['car_id','images', 'default'];

    public function user(){
        return $this->belongsTo('App\Cars', 'car_id');
    }

}
