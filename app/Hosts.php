<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hosts extends Model
{
    //
    protected $fillable = ['user_id', 'license_number', 'fee', 'status'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function car(){
        return $this->hasOne('App\Cars', 'host_id');
    }

    public function documents(){
        return $this->hasMany('App\Documents', 'host_id');
    }

    public function languages(){
        return $this->hasMany('App\HostLanguages', 'host_id');
    }

    public function services(){
        return $this->hasMany('App\HostServices', 'host_id');
    }
}
