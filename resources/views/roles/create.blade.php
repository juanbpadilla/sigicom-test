<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Nuevo Rol</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.store')}}" method="POST">
            @csrf
            
                <div class="form group">
                    <label for="nombre">Llave de Rol</label>
                    <input value="" type="text" name="nombre" class="form-control" placeholder="Inserte el Nuevo Rol" required>
                </div>
                
                <div class="form group">
                    <label for="display_name">Nombre de Rol</label>
                    <input type="text" name="display_name" class="form-control" placeholder="Inserte el Nuevo Rol" value="">
                </div>
                
                <div class="form group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" placeholder="Inserte el Nuevo Rol" value="">
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
    </x-auth-card>
</x-app-layout>
        


