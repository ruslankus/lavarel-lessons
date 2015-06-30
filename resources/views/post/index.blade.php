@extends('main')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

@include('post._nav')

<section id="list" class="container">
    <div>
    <h3>Main</h3>
    <h4>Latest feedBack</h4>


        <div class="item">
            <p>From: {{$post->name}}</p>
            <p>Email: {{$post->email}}</p>
            <p>Mood: {{$post->moods->mood_name }}</p>
            <p>City: {{$post->cities->city_name }}</p>
            <p>Date : {{$post->created_at}}</p>
            <p>{{$post->content}}</p>
            <hr />
        </div>
    </div>
</section>


@stop
