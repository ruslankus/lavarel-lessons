@extends('layout')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop

@section('content')

    <div class="container">
        <h2>Edit <?=$article->title; ?></h2>
        {!! Form::model($article,['method' => 'PATCH','action' => ['ArticleController@update', $article->id ]]) !!}

        @include("article.form._form",['buttonText' => 'Update article'])

        {!! Form::close() !!}
    </div>

   @include("errors.articles._form-errors");


@stop