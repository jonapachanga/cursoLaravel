@extends('layout')

@section('contenido')

<h1>Contactos</h1>
@if (session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('mensajes.store') }}" method="POST">
	{{--  <input type="hidden" value="{{ csrf_token() }}">  --}}
	{{ csrf_field() }}
	<label for="">
		Nombre
		<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
		{!! $errors->first('nombre','<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="">
		Email
		<input class="form-control" type="email" name="email" value="{{ old('email') }}">
		{!! $errors->first('email', '<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="">
		Mensaje
		<textarea class="form-control" name="mensaje" id="" cols="30" rows="10">{{ old('mensaje') }}</textarea>
		{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
	</label>
	<br>
	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
@endif
<hr>
@stop