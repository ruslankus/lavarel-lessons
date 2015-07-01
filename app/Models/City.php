<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Models\City','city','id');
    }


    public function moods()
    {
        return $this->hasMany('App\Models\Mood','mood','id');
    }
}
