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
            <th>photo</th>
            <th>name</th>
            <th>email</th>
            <th>Country </th>
            <th>actions</th>
        </tr>

        <?php foreach($users as $user):

            if(!empty($user->photo_id)){
                $imgName = "/upload/images/".$user->photo->photo_name;
            }else{
                $imgName = "/upload/images/no-photo.jpg";
            }


        ?>
        <tr>
            <td>{{$user->id}}</td>
            <td>
                <img src="<?=$imgName; ?>" class="img-circle" width="80" height="80" >
            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td><?=$user->country->country_name; ?></td>
            <td>
                <a href="<?=action('AdminController@getEdit', ['id'=> $user->id ])?>" class="btn btn-sm btn-success">Edit</a>
                <a href="<?=action('AdminController@getDelete', ['id' => $user->id])?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach?>
        </table>


    </div>
    <div>

    </div>
</section>

@stop
