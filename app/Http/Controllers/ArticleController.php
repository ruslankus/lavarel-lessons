<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Tag;
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

        $tags = Tag::lists('name','id');

        return view('article.form',compact('tags'));
    }

    public function store(ArticleRequest $request){

        $tagIds = $request->input('tag_list');

        $article = \Auth::user()->articles()->create($request->all());
        $article->tags()->attach($tagIds);

        return redirect('articles')->with([
            'flash_message' => 'Your article has been created'
        ]);
    }


    public function edit(Article $article){

        $tags = Tag::lists('name','id');
        return view('article.edit',compact('article','tags'));
    }


    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }


    protected function syncTags(Article $article, $tagIds)
    {
        if (!empty($tagIds)) {
            $article->tags()->sync($tagIds);
        } else {
            $article->tags()->detach();
        }
    }
}
