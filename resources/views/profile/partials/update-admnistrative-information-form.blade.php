<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Administrative Information') }}
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
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
