@extends('main')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

@include('post._nav')

<section id="list">
    <h3>Main</h3>
    <div>

    </div>

</section>


@stop
