@extends('main')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    @include('post._nav')
<section id="list" class="container">
    <h3>User list</h3>
    <div class="list">
        <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>actions</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td></td>
        </tr>
        @endforeach
        </table>


    </div>
    <div>

    </div>
</section>

@stop
