@extends('layout')

@section('contenido')

{{-- {{ dd($user)->toArray() }} --}}

<h1>Editar Usuario</h1>
@if (session()->has('info'))
	<div class="alert alert-success" role="alert">
		{{ session('info') }}
	</div>
@endif
<form action="{{ route('usuarios.update', $user->id) }}" method="POST">
    {!! method_field('PUT') !!}
	{{--  <input type="hidden" value="{{ csrf_token() }}">  --}}
	@include('users.form')
	<input class="btn btn-primary" type="submit" value="Enviar">
	<a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Cancelar</a>
	
</form>
@stop