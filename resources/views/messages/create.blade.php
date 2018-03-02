@extends('layout')

@section('contenido')

<h1>Contactos</h1>
@if (session()->has('info'))
	<h3>{{ session('info') }}</h3>
@else
<form action="{{ route('mensajes.store') }}" method="POST">
	@include('messages.form', [
		'message' => new \App\Message,
		'showFields' => auth()->guest(),
	])
</form>
@endif
<hr>
@stop