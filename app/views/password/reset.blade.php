
@extends('layouts.master')

@section('header')
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-md-offset-4">
        <div class="well">
            <legend>Enter your email and hit the button</legend>
            {{ Form::open(array('action' => 'RemindersController@postReset')) }}
            @if($errors->any())
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $error->all('<li class="error">:message</li>'))}}
            </div>
            @endif
            {{ Form::hidden('token', $token) }} <br />
            {{ Form::text('email', '', array('class'=> 'form-control', 'placeholder' => 'Email')) }} <br />
            {{ Form::password('password', array('class'=> 'form-control', 'placeholder' => 'New password')) }} <br />
            {{ Form::password('password_confirmation', array('class'=> 'form-control', 'placeholder' => 'Confirm password')) }} <br />
            {{ Form::submit('Reset password', array('class' => 'btn btn-success')) }}
            {{ Form:: close() }}

        </div>
    </div>
</div>

@stop
