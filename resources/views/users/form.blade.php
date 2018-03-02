{{ csrf_field() }}
<label for="nombre">
    Nombre
    <input class="form-control" type="text" name="name" value="{{ $user->name or old('name') }}">
    {!! $errors->first('nombre','<span class=error>:user</span>') !!}
</label>
<br>
<label for="email">
    Email
    <input class="form-control" type="email" name="email" value="{{ $user->email or old('email') }}">
    {!! $errors->first('email', '<span class=error>:message</span>') !!}
</label>
<br>
@unless($user->id)
    <label for="password">
        Password
        <input class="form-control" type="password" name="password">
        {!! $errors->first('password','<span class=error>:message</span>') !!}
    </label>
    <br>
    <label for="password_confirmation">
        Password Confirm
        <input class="form-control" type="password" name="password_confirmation">
        {!! $errors->first('password_confirmation','<span class=error>:message</span>') !!}
    </label>

@endunless
<br>
<div class="checkbox">
    @foreach($roles as $id => $name)
        <label for="">
            <input
                    type="checkbox"
                    name="roles[]"
                    {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                    value="{{ $id }}">
            {{ $name }}
        </label>
    @endforeach
        {!! $errors->first('roles','<span class=error>:message</span>') !!}
</div>