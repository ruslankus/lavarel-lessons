@extends('layout')

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
@stop


@include('admin._nav')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new User </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        <?=Form::model($user,['method' =>'PATCH','action' => ['AdminController@patchUpdate',$user->id],
                                    'class' => 'form-horizontal', 'role' => 'form' ])?>

                        <?php  Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) ?>
                        <?php  Form::text('title',null,['class' => ' form-control'] ) ?>

                        <div class="form-group">
                            <?=Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) ?>

                            <div class="col-md-6">
                                <?=Form::text('name',null,['class' => ' form-control'] ) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?=Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) ?>
                            <div class="col-md-6">
                                <?=Form::email('email',null,['class' => ' form-control'] ) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?=Form::label('country_id', 'Country', ['class' => 'col-md-4 control-label']) ?>

                            <div class="col-md-6">
                                <?=Form::select('country_id', $countrySelect,null,['class' => 'form-control']);?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?=Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) ?>
                            <div class="col-md-6">
                                <?=Form::input('password','password',null,['class' => 'form-control'] ) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?=Form::label('password_confirmation', 'Confirm Password',
                                    ['class' => 'col-md-4 control-label']) ?>

                            <div class="col-md-6">
                                <?=Form::input('password','password_confirmation',null,['class' => 'form-control'] ) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save User
                                </button>
                            </div>
                        </div>
                        <?=Form::close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop