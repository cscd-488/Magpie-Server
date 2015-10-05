<?php
/**
 * User: ben
 * Date: 10/4/15
 */

namespace App\Models;


use App\Models\Relations\MulitFieldPolyMorph;

class Listing extends UUIDModel{

    public $fillable = ['price', 'condition'];

    public function title(){
        return $this->multiMorphMany('App\Models\Translation', 'translatable', 'listing_title');
    }

    public function description(){
        return $this->multiMorphMany('App\Models\Translation', 'translatable', 'listing_description');
    }

    public function multiMorphMany($related, $name, $customType, $type = null, $id = null, $localKey = null)
    {
        $instance = new $related;

        // Here we will gather up the morph type and ID for the relationship so that we
        // can properly query the intermediate table of a relation. Finally, we will
        // get the table and create the relationship instances for the developers.
        list($typeColumn, $idColumn) = $this->getMorphs($name, $type, $id);

        $table = $instance->getTable();

        $localKey = $localKey ?: $this->getKeyName();

        return new MulitFieldPolyMorph($instance->newQuery(), $this, $customType, $table.'.'.$typeColumn, $table.'.'.$idColumn, $localKey);
    }
}