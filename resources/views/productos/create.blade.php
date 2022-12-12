<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Nuevo Producto</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('productos.store')}}" method="POST">
            @csrf
            <div class="form group">
                <label for="nombre_producto">Nombre de Producto</label><br>
                <input type="text" name="nombre_producto" id="nombre_producto" class="form-control" placeholder="Escriba el nombre del producto" required><br>
                <label for="precio">Precio de Compra</label><br>
                <input type="text" name="precio" class="form-control" placeholder="Escriba el precio de compra Bs."><br>
                <label for="marca">Marca del producto</label><br>
                <select name="marca" class="form-control">
                    <option value="MONOPOL">Pinturas Monopol</option>
                    <option value="EL PUENTE">Cemneto El Puente</option>
                    <option value="CAMBA">Cemento Camba</option>
                    <option value="TRUPPER">Serrucho Trupper</option>
                    <option value="WoKiN">Martillo WoKin</option>
                    <option value="IMA">Placas de Pvc IMA</option>
                    <option value="Faboce">Porcelanato y Socalos Faboce</option>
                </select><br>
                <label for="proveedor">Nombre del Proveedor</label><br>
                <select name="proveedor_id" class="form-control">
                    @foreach ( $proveedores as $proveedor)
                        <option value="{{$proveedor->id}}">{{$proveedor->nombre_proveedor}}</option>
                    @endforeach
                    </select><br>
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
