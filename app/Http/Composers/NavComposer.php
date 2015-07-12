<?php
namespace App\Http\Composers;

use App\Models\Article;

class NavComposer
{
    public function compose($view)
    {
        $latest = Article::latest()->first();

        $view->with(compact('latest'));
    }


    public function adminCompose($view)
    {
        $user = \Auth::user();

        $view->with(compact('user'));
    }
}