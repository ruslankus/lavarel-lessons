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

//Route::get('/', 'PostController@index' );

get('/',['as' => 'post_main','uses' =>"PostController@index"]);

get('/post/edit/{id}',['as' => 'post.edit','uses' =>"PostController@edit"]);

Route::group(['prefix' => 'en'], function () {
    Route::resource('post','PostController');
});



Route::get('user/{id}', function ($id) {

})->where('id', '[0-9]+');

//Route::resource('post','PostController');

