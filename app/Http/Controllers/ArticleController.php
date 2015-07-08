<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Carbon\Carbon;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except' => 'index']);
    }

    public function index(){

        //return \Auth::user();

        $articles = Article::latest('published_at')->published()->get();

        return view('article.index',compact('articles'));
    }


    public function show(Article $article){

        return view('article.single',compact('article'));
    }


    public function create(){
        return view('article.form');
    }

    public function store(ArticleRequest $request){

        /*
        $input = Request::all();

        $article = new Article();
        $article->title = $input['title'];
        $article->body = $input['body'];
        $article->published_at = Carbon::now();
        */

        \Auth::user()->articles()->create($request->all());

        return redirect('articles')->with([
            'flash_message' => 'Your article has been created'
        ]);
    }


    public function edit(Article $article){

        return view('article.edit',compact('article'));
    }


    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());

        return redirect('articles');
    }
}
