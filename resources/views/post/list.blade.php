@extends('main')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @include('post._nav')
<section id="list" class="container">
    <h3>Feedback list</h3>
    <div class="list">

        @foreach($posts as $post)
        <div class="item">
            <p>From: {{$post->name}}</p>
            <p>Email: {{$post->email}}</p>
            <p>Mood: {{$post->moods->mood_name }}</p>
            <p>City: {{$post->cities->city_name }}</p>
            <p>Date : {{$post->created_at}}</p>
            <p>{{$post->content}}</p>
            <hr />
        </div>
        @endforeach


    </div>
    <div>
        <?php echo $posts->render(); ?>
    </div>
</section>

@stop
