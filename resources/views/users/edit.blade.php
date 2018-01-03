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
	{{ csrf_field() }}
	<label for="">
		Nombre
		<input class="form-control" type="text" name="name" value="{{ $user->name }}">
		{!! $errors->first('nombre','<span class=error>:user</span>') !!}
	</label>
	<br>
	<label for="">
		Email
		<input class="form-control" type="email" name="email" value="{{ $user->email }}">
		{!! $errors->first('email', '<span class=error>:message</span>') !!}
	</label>
	<br>
	<input class="btn btn-primary" type="submit" value="Enviar">
	<a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Cancelar</a>
	
</form>
@stop