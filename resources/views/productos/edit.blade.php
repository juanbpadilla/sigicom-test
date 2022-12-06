<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Edit Producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('productos.update', $producto->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form group">
                <label for="nombre">Nombre de producto</label><br>
                <input value="{{$producto->nombre_producto}}" type="text" name="nombre" class="form-control" placeholder="Escriba el nombre del producto" required><br>
                <label for="precio">precio de compra</label><br>
                <input value="{{$producto->precio_compra}}" type="text" name="precio" class="form-control" placeholder="Escriba el precio de compra"><br>
                <label for="marca">Marca del producto</label><br>
                <select name="marca" class="form-control">
                    <option value="Monopol">Pinturas Monopol</option>
                    <option value="El Puente">Cemneto El Puente</option>
                    <option value="Camba">Cemento Camba</option>
                    <option value="Serrucho Trupper">Serrucho Trupper</option>
                    <option value="WoKin">Martillo WoKin</option>
                    <option value="PvcIMA">Placas de Pvc IMA</option>
                    <option value="Faboce">Faboce</option>
                </select><br>
                <label for="proveedor">Empresa del Proveedor</label><br>
                <select name="proveedor_id" class="form-control">
                    @foreach ( $proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre_proveedor}}</option>
                    @endforeach
                    </select><br>
            </div>
            <div class="flex items-center justify-end mt-4">
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
