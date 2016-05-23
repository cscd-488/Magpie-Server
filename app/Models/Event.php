<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use DB;

class Event extends Model
{

    public function checkpoints(){
        return $this->hasMany('App\Models\Checkpoint');
    }

    public static function proximity($radius, $lat, $lon) {

        $events = select(
            DB::raw("*,
            ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) )
            * cos( radians( lon ) - radians($lon) ) + sin( radians($lat) )
            * sin( radians( lat ) ) ) )
            AS distance FROM markers HAVING distance < $radius ORDER BY distance LIMIT 0 , 20")
        )->get();

        return $events;

    }

}