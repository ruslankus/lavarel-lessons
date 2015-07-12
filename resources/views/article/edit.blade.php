@extends('artmain')

@section('css')
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')

    <div class="row">
        <h2>Edit <?=$article->title; ?></h2>
        {!! Form::model($article,['method' => 'PATCH','action' => ['ArticleController@update', $article->id ]]) !!}

        @include("article.form._form",['buttonText' => 'Update article'])

        {!! Form::close() !!}
    </div>

   @include("errors.articles._form-errors");


@stop

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script>
        $('#tags_list').select2({
            placeholder:'Choose a tag',
            tags: true
        });
    </script>
@stop