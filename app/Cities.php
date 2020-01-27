<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    //
    protected $fillable = ['state', 'name', 'country_id'];

    public function country(){
        return $this->belongsTo('App\Countries', 'country_id');
    }
}
