<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{


    public function show(Tag $tags){

        $articles = $tags->articles()->published()->get();

        dd($articles);

        return view('article.index',compact('articles'));
    }
}
