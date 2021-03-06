<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $guarded = ['user_id', 'created_at', 'updated_at'];

    protected $fillable = ['google_id', 'first_name', 'last_name'];

    public static function findOrCreateByGoogleId($googleId){
        return static::firstOrCreate(['google_id' => $googleId]);
    }
}