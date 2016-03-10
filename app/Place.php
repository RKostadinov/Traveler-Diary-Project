<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['userId', 'name', 'dateFrom','dateTo','public','mainPhoto'];

    public function photos()
    {
        return $this->hasMany('App\Photo', 'placeId');
    }
}
