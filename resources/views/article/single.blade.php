@extends('layout')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop

@section('content')

    <div class="container">

        <div class="row">
            <h2><?= $article->title; ?></h2>
            <p><?=$article->body; ?></p>
        </div>

    </div>

@stop