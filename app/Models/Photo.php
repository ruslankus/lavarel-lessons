<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function users(){
        return $this->hasMany('App\Models\User','photo_id','id');
    }
}
