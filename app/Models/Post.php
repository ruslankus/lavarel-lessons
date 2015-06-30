<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function cities()
    {
        return $this->belongsTo('App\Models\City','city');
    }


    public function moods()
    {
        return $this->belongsTo('App\Models\Mood','mood');
    }
}
