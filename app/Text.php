<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $table = "texts";

    protected $fillable = ['placeId', 'text'];

    public function place()
    {
        return $this->belongsTo('Place', 'placeId');
    }
}
