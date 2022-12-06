<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="card-header text-center">
            <h5>{{ __('Editar Poveedor') }}</h5>
        </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('proveedores.update', $proveedor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form group">
                <label for="nombre">Nombre del Proveedor</label>
                <input value="{{$proveedor->nombre_proveedor}}" type="text" name="nombre" class="form-control" placeholder="Escriba su nombre" required><br>
                <label for="apellido">Apellidos del Proveedor</label>
                <input value="{{$proveedor->apellido_preveedor}}" type="text" name="apellido" class="form-control" placeholder="Escriba sus apellidos" required><br>
                <label for="direccion">Direccion del Proveedor</label>
                <input value="{{$proveedor->direccion_proveedor}}" type="text" name="direccion" class="form-control" placeholder="Escriba su direccion" required><br>
                <label for="email">Email</label>
                <input value="{{$proveedor->correo}}" type="text" name="telefono" class="form-control" placeholder="Escriba su telefono" required><br>
                <label for="telefono">Telefono</label>
                <input value="{{$proveedor->telefono}}" type="text" name="telefono" class="form-control" placeholder="Escriba su telefono" required><br>
            </div>
            <div class="flex items-center justify-end mt-4">
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </div>
            </form>

        </div>
    </div>
    </x-auth-card>
</x-app-layout>
