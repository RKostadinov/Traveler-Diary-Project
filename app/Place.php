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

    public function text()
    {
        return $this->hasOne('App\Text', 'placeId');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'userId');
    }
}
