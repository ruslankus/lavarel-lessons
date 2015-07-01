<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function cities()
    {
        return $this->belongsTo('App\Models\City','city','id');
    }


    public function moods()
    {
        return $this->belongsTo('App\Models\Mood','mood','id');
    }


    public function getLatestPost(){
        $postCollection = $this->latest('id')->limit(1)->get();
        $objPost = $postCollection->shift();
        return $objPost;
    }






}
