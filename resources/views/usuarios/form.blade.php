{!! csrf_field() !!}

@if(auth()->check())
    @if (auth()->user()->hasRoles(['admin']))
    <div>
        <div class="form-group">
            <div class="custom-control custom-switch ml-2">
                <input 
                    type="radio" class="custom-control-input" 
                    value='1'
                    id="estado1" 
                    name="estado"
                    {{ $user->estado ? 'checked' : '' }}>
                <label class="custom-control-label {{ 'input[name="estado"]:checked' ? 'h5 text-success' : 'text-secondary' }}" for="estado1">
                    Usuario habilitado
                </label>
            </div>
            <div class="custom-control custom-switch ml-2">
                <input 
                    type="radio" class="custom-control-input" 
                    value='0'
                    id="estado2" 
                    name="estado"
                    {{ $user->estado ? '' : 'checked' }}>
                <label class="custom-control-label" for="estado2">
                    Usuario deshabilitado
                </label>
            </div>
        </div>
    </div>
    @endif
@endif

<div class="form-group">
    <div class="container-md">
        <label for="name">Nombre</label>
        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}">
        {!! $errors->first('name', '<span class=error>:message</span>') !!}
    </div>
</div>

<div class="form-group">
    <div class="container-md">
        <label for="apellidos">Apellido</label>
        <input class="form-control" type="text" name="apellidos" value="{{ old('apellidos', $user->apellidos) }}">
        {!! $errors->first('apellidos', '<span class=error>:message</span>') !!}
    </div>
</div>


<div class="form-group">
    <div class="container-md">
        <label for="telefono">Telefono</label>
        <input class="form-control" type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}">
        {!! $errors->first('telefono', '<span class=error>:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <div class="container-md">
        <label for="email">Correo</label>
        <input class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">
        {!! $errors->first('email', '<span class=error>:message</span>') !!}
    </div>
</div>

@unless($user->id)
    <div class="form-group">
        <div class="container-md">
            {{-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Contraseña') }}" autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
            <label for="password">{{ __('Nueva contraseña') }}</label>
            <input class="form-control" type="password" name="password">
            {!! $errors->first('password', '<span class=error>:message</span>') !!}
        </div>
    </div>

    <div class="form-group">
        <div class="container-md">
            {{-- <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmar contraseña') }}" autocomplete="new-password"> --}}
            <label for="password_confirmation">{{ __('Confirmar nueva contraseña') }}</label>    
            <input class="form-control" type="password" name="password_confirmation">
            {!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
        </div>
    </div>
@endunless

@if(auth()->check())
    @if (auth()->user()->hasRoles(['admin']))
    <div class="mb-3 mt-3 ml-2">
        <label for="">{{ __('Roles') }}</label><br>
        @foreach($roles as $nombre)
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input 
                        type="checkbox" class="form-check-input" 
                        value="{{ $nombre->id }}" 
                        name="roles[]"
                        {{ $user->check($nombre->id) }}>
                    {{ $nombre->display_name }}
                </label>
            </div>
        @endforeach
    </div>
    @endif
@endif
{!! $errors->first('roles', '<span class=error>:message</span>') !!}
{{-- {!! $errors->first('g-recaptcha-response', '<span class=error>:message</span>') !!} --}}
<hr>
