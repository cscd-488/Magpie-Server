<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

abstract class UUIDModel extends Model{

    public $incrementing = false;

    protected $hidden = ['id'];

    protected $appends = ['uuid'];

    public static function boot(){

        parent::boot();

        static::creating(function(UUIDModel $model){
            $model->{$model->getKeyName()} = $model->generateUUID();
        });

    }

    /**
     * UUID string in binary format
     * @return string
     */
    protected function generateUUID(){
        return Uuid::uuid4()->getBytes();
    }


    public function getUuidAttribute(){
        return Uuid::fromBytes($this->id)->toString();
    }
}