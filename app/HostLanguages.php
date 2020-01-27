<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostLanguages extends Model
{
    //
    protected $fillable = ['host_id', 'language_id'];

    public function host(){
        return $this->belongsTo('App\Hosts', 'id', 'host_id');
    }

    public function language(){
        return $this->belongsTo('App\Languages', 'language_id');
    }
}
