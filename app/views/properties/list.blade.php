
@extends('layouts.master')

@section('content')

<h1>Fastigheter</h1>

@if(count(properties) > 0)

<table>

    <tr><th>Name</th><th>Designation</th></tr>
@foreach ($properties as $property)

        <tr>
            <td>
                {{ $property->name }}
            </td>

        </tr>

@endforeach



</table>

@endif

@stop
