<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypes extends Model
{
    //
    protected $fillable = ["user_id", "type"];

    public function user(){
        return $this->belongsTo('App\Users', 'user_id');
    }
}
