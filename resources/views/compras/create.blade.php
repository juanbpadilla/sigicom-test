<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Nueva Compra</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('compras.store')}}" method="POST">
            @csrf
            <div class="form group">
                {{-- <label for="fecha">Fecha de la Compra</label>
                <input type="date" name="fecha" class="form-control" required><br> --}}
                <label for="catidad">Cantidad de Productos</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Escriba la cantidad de productos adquiridos" required><br>
                <label for="precio">Precio de Unitario</label>
                <input type="number" step="0.01" min="0" name="precio" id="precio" class="form-control" placeholder="Escriba el monto de la compra de productos" required><br>
                {{-- <label for="total">Total</label>
                <input type="text" name="total" id="total" class="form-control"><br> --}}
                <label for="descripcion">descripcion de la Compra</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Escriba el monto de la compra de productos" required><br>


                {{-- <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        @if ($user->isAdmin())
                            {
                            <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                            }
                        @endif
                    @endforeach
                </select><br> --}}
                <label for="producto">Producto</label>
                <select name="producto_id" class="form-control">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select><br>
                <label for="proveedor">Proveedor</label>
                <select name="proveedor_id" class="form-control">
                    @foreach ($proveedors as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>

        </div>
    </div>
    </x-auth-card>
</x-app-layout>
