<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();

        return view('article.index',compact('articles'));
    }


    public function show($id){
        $article = Article::findOrFail($id);
        return view('article.single',compact('article'));
    }
}
