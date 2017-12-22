@extends('layout')

@section('contenido')
    <h1>Editar Mensaje</h1>
    <form action="{{ route('mensajes.update', $message->id) }}" method="POST">
    {!! method_field('PUT') !!}
	{{--  <input type="hidden" value="{{ csrf_token() }}">  --}}
	{{ csrf_field() }}
	<label for="">
		Nombre
		<input class="form-control" type="text" name="nombre" value="{{ $message->nombre }}">
		{!! $errors->first('nombre','<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="">
		Email
		<input class="form-control" type="email" name="email" value="{{ $message->email }}">
		{!! $errors->first('email', '<span class=error>:message</span>') !!}
	</label>
	<br>
	<label for="">
		Mensaje
	</label>
		<textarea class="form-control" name="mensaje" id="" cols="30" rows="10">{{ $message->mensaje }}
        </textarea>
		{!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
	<br>
	<input class="btn btn-primary" type="submit" value="Enviar">
</form>
@stop