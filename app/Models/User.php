<?php
/**
 * @author Benjamin Daschel
 * Date: 1/20/16
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = ['first_name', 'last_name'];

    public static function findOrCreateByFacebookId($facebookId){
        return static::firstOrCreate(['facebook_id' => $facebookId]);
    }
}