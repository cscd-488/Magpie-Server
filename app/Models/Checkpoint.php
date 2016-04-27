<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{

    protected $fillable =['status'];

    public function event() {
        return $this->belongsTo('App\Models\Event', 'event_id');
    }

}
