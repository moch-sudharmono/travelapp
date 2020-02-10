<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
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

    public static function findAvailableHost($date, $city){
        $results = User::where('city', $city)->get();
        $result = [];
        foreach($results as $users){
            #Available by City
            $data = Hosts::with('user','car')->where('user_id', $users->id)->first();
            #Must add Available on date
            if($data){
                $result[] = $data;
            }
        }
        //

        return $result;
    }

    
}
