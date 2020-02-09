<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
    //
    protected $fillable = ['user_id', 'license_number', 'license_image', 'insurance_number', 'social_security', 'background_check',  'fee', 'status'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function car(){
        return $this->hasOne('App\Cars', 'host_id');
    }

    
}
