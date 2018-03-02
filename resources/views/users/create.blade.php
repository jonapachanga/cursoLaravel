@extends('layout')

@section('contenido')
    <h1>Crear usuario</h1>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @include('users.form', ['user' => new App\User])
        <input class="btn btn-primary" type="submit" value="Guardar">
        <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Cancelar</a>
    </form>
@stop