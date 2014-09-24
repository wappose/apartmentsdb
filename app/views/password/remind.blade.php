@extends('layouts.master')

@section('header')
@stop

@section('content')
<div class="row">
    <div class="col-md-3 col-md-offset-4">
        <div class="well">
            <legend>Enter your email and hit the button</legend>
            {{ Form::open(array('action' => 'RemindersController@postRemind')) }}
            @if($errors->any())
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $error->all('<li class="error">:message</li>'))}}
            </div>
            @endif
            {{ Form::text('email', '', array('class'=> 'form-control', 'placeholder' => 'Email')) }} <br />
            {{ Form::submit('Send reminder', array('class' => 'btn btn-success')) }}
            {{ Form:: close() }}

        </div>
    </div>
</div>

@stop
