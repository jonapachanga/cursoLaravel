{{--  <input type="hidden" value="{{ csrf_token() }}">  --}}
{{ csrf_field() }}
@unless($message->user_id)
    <label for="">
        Nombre
        <input class="form-control" type="text" name="nombre" value="{{ $message->nombre or old('nombre') }}">
        {!! $errors->first('nombre','<span class=error>:message</span>') !!}
    </label>
    <br>
    <label for="">
        Email
        <input class="form-control" type="email" name="email" value="{{ $message->email or old('email') }}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    </label>
@endunless
<br>
<label for="">
    Mensaje
    <textarea class="form-control" name="mensaje" id="" cols="30" rows="10">{{ $message->mensaje or old('mensaje') }}</textarea>
    {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
</label>
<br>
<input class="btn btn-primary" type="submit" value="{{ $btnText or 'Guardar' }}">