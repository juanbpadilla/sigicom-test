<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Apellidos -->
        <div>
            <x-input-label for="apellidos" :value="__('Apellidos')" />
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos', $user->apellidos)"/>
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>
        
        <!-- Telefono -->
        <div>
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono',$user->telefono)"/>
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        @if(auth()->check())
            @if (auth()->user()->hasRoles(['admin']))
                <!-- Estado -->
                {{-- <div class="mt-4">
                    <x-input-label for="estado" :value="__('Estado')" />
                    <x-text-input id="estado" class="block mt-1 w-full" type="estado" name="estado" :value="old('estado')" required />
                    <x-input-error :messages="$errors->get('estado')" class="mt-2" />
                </div> --}}
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
            @endif
        @endif

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

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
