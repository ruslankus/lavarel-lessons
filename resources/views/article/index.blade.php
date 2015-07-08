@extends('artmain')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop

@section('content')

    <div class="container">
        <?php foreach($articles as $article):?>
        <div class="row">
            <h2>
                <a href="<?=action('ArticleController@show',$article->id)?>">
                    <?= $article->title; ?>
                </a>
            </h2>
        <p><?=$article->body; ?></p>
       </div>
       <?php endforeach; ?>
    </div>

@stop