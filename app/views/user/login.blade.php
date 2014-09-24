@extends('layouts.master')

@section('header')

@stop

@section('content')

<div class="row">

    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('action' => 'UserController@postLogin')) }}
                @if($errors->any())
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <ul class="list-unstyled">
                    {{ implode('', $errors->all('<li>:message</li>')) }}
                    </ul>
                </div>
                @endif
                <div class="form-group">
                {{ Form::text('username', '', array('class'=> 'form-control', 'placeholder' => 'Username')) }}
                </div>
                <div class="form-group">
                {{ Form::password('password', array('class'=> 'form-control', 'placeholder' => 'Password'))}}
                </div>
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('remember_me', "1") }}
                        Remember Me

                    </label>
                </div>
                <div class="form-group">
                {{ Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block')) }}
                </div>
                {{ link_to_action('RemindersController@getRemind', 'Remind me of my password!', array('class' => 'pull-right')) }}
                {{ Form:: close() }}

            </div>
        </div>
    </div>
</div>

@stop
