<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $fillable = ['host_id','title', 'attachment'];
}
