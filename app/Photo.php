<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = "photos";

    protected $fillable =  ['placeId', 'photoUrl'];

    public function place()
    {
        return $this->belongsTo('Place', 'placeId');
    }

}
