<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function checkpoints(){
        return $this->hasMany('App\Models\Checkpoint');
    }
}