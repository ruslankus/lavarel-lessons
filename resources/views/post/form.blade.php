@extends('main')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @include('post._nav')

<section id="form" class="container">
    {!! Form::open(['route' => 'post.store'])  !!}
        @include('post._form')
    {!! Form::close() !!}
</section>
@stop
