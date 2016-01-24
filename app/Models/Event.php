<?php
/**
 * @author Benjamin Daschel
 * Date: 1/23/16
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function locations(){
        return $this->hasMany('App\Models\Location');
    }
}