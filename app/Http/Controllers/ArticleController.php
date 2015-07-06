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


    public function show($id){
        $article = Article::findOrFail($id);

        //dd($article->published_at);

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


        $article = new Article($request->all());
        \Auth::user()->articles()->save($article);

        return redirect('articles');
    }


    public function edit($id){

        $article = Article::findOrFail($id);

        return view('article.edit',compact('article'));
    }


    public function update($id, ArticleRequest $request){

        $article = Article::findOrFail($id);


        $article->update($request->all());

        return redirect('articles');
    }
}
