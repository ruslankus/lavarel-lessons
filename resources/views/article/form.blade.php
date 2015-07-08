@extends('artmain')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop

@section('content')

    <div class="container">
        <h2>Create new articles</h2>
        <?=Form::open(['action' => 'ArticleController@store']);?>

        @include("article.form._form",['buttonText' => 'Add article'])

        <?=Form::close(); ?>
    </div>

    @include("errors.articles._form-errors");


@stop