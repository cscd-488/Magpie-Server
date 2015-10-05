<?php
/**
 * User: ben
 * Date: 10/4/15
 */

namespace App\Models;


use Ramsey\Uuid\Uuid;

class Translation extends UUIDModel{

    protected $fillable = ['value', 'lang'];

    protected $hidden = ['id', 'translatable_id'];

    protected $appends = ['parent_uuid'];

    public function getParentUuidAttribute(){
        return Uuid::fromBytes($this->translatable_id)->toString();
    }
}