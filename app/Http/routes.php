<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


function boot(Router $router)
{
    $router->pattern('id', '[0-9]+');

    parent::boot($router);
}

get('/',['as' => 'post_main','uses' =>"PostController@index"]);

get('/about',['as' => 'about', 'uses' => 'PageController@about']);

get('/post/edit/{id}',['as' => 'post.edit','uses' =>"PostController@edit"]);

Route::resource('articles', 'ArticleController');

Route::controllers(['admin' => 'AdminController']);

Route::get('tags/{tag}','TagsController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::resource('post','PostController');

