<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    public function event() {
        return $this->hasOne('event_id');
    }

}