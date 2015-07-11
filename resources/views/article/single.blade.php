@extends('artmain')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop

@section('content')

    <div class="container">

        <div class="row">
            <h2><?= $article->title; ?></h2>
            <p><?=$article->body; ?></p>

            @unless($article->tags->isEmpty())
            <h5>Tags:</h5>
            <ul>
                @foreach($article->tags as $tag )
                    <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
            @endunless

        </div>

    </div>

@stop