@extends('layout')

@section('contenido')
    <h1>Todos los usuarios</h1>
     <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                         {{ $user->roles->pluck('display_name')->implode(' - ') }}
                    <td>
                        <a  class="btn btn-info btn-sm" 
                            href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
                        <form   style="display:inline;" 
                                action="{{ route('usuarios.destroy', $user->id) }}" 
                                method="POST">
                        {!! csrf_field() !!}
                        {!! method_field('delete') !!}
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop