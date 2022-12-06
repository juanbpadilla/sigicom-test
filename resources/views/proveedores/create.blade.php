<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Nuevo Proveedor</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('proveedores.store')}}" method="POST">
            @csrf
            <div class="form group">
                <label for="nombre">Nombre del Proveedor</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre" required><br>
                <label for="apellido">Apellidos del Proveedor</label>
                <input type="text" name="apellido" class="form-control" placeholder="Escriba sus apellidos" required><br>
                <label for="direccion">Direccion del Proveedor</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba su direccion" required><br>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Escriba su telefono" required><br>
                <label for="correo">Correol Electronico</label>
                <input type="text" name="correo" class="form-control" placeholder="Escriba su email" required><br>
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
