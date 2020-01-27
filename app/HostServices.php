<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostServices extends Model
{
    //
    protected $fillable = ['host_id', 'service_id'];

    public function host(){
        return $this->belongsTo('App\Hosts', 'id', 'host_id');
    }

    public function service(){
        return $this->belongsTo('App\Services', 'service_id');
    }
    
}
