@extends('layout')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop


@include('admin._nav')


@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

<section id="list" class="container">
    <h3>User list</h3>
    <div class="list">
        <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>Country </th>
            <th>actions</th>
        </tr>

        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><?=$user->country->country_name; ?></td>
            <td>
                <a href="<?=action('AdminController@getEdit', ['id'=> $user->id ])?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?=action('AdminController@getDelete', ['id' => $user->id])?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach
        </table>


    </div>
    <div>

    </div>
</section>

@stop
