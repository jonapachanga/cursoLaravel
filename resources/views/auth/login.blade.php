@extends('layout')

@section('contenido')
    <h1>Login</h1>
    <form action="/login" method="POST" class="form-inline">
        {!! csrf_field() !!}
        <input class="form-control" type="email" name="email" placeholder="email">
        <input class="form-control" type="password" name="password" placeholder="password">
        <input class="btn btn-primary" type="submit">
    </form>

@stop