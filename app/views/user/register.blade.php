@extends('layouts.master')

@section('header')

@stop

@section('content')

<div class="row">
    <div class="col-md-3 col-md-offset-4">
        <div class="well">
            <legend>Userregistration</legend>
            {{ Form::open(array('action' => 'UserController@postRegister')) }}
            @if($errors->any())
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <ul class="list-unstyled">
                {{ implode('', $errors->all('<li>:message</li>')) }}
                </ul>
            </div>
            @endif
            {{ Form::text('username', '', array('class'=> 'form-control', 'placeholder' => 'Username')) }} <br />
            {{ Form::text('email', '', array('class'=> 'form-control', 'placeholder' => 'Email')) }} <br />
            {{ Form::password('password', array('class'=> 'form-control', 'placeholder' => 'Password'))}} <br />
            {{ Form::submit('Register', array('class' => 'btn btn-success')) }}
            {{ Form:: close() }}

        </div>
    </div>
</div>

@stop
