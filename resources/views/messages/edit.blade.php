@extends('layout')

@section('contenido')
    <h1>Editar Mensaje</h1>
<form action="{{ route('mensajes.update', $message->id) }}" method="POST">
    {!! method_field('PUT') !!}
	@include('messages.form', ['btnText' => 'Actualizar'])
</form>
@stop