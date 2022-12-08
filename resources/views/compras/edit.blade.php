<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Editando Compra</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('compras.update', $compras->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form group">
                <label for="fecha">Fecha de la Compra</label>
                <input value="{{$compra->fecha}}" type="date" name="fecha" class="form-control" required><br>
                <label for="catidad">Cantidad de Productos</label>
                <input value="{{$compra->cantidad}}" type="text" name="cantidad" class="form-control" placeholder="Escriba la cantidad de productos adquiridos" required><br>
                <label for="precio">Precio de la Unitario</label>
                <input value="{{$compra->precio}}" type="text" name="precio" class="form-control" placeholder="Escriba el monto de la compra de productos" required><br>
                <label for="total">Total</label>
                <input value="{{$compra->total}}" type="text" name="total" class="form-control" required><br>
                <label for="descripcion">descripcion de la Compra</label>
                <input value="{{$compra->descripcion}}" type="text" name="descripcion" class="form-control" placeholder="Escriba el monto de la compra de productos" required><br>

                <label for="user">Administrador</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            @if ($user->isAdmin())
                                {
                                <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                }
                            @endif
                        @endforeach
                    </select><br>

                    <label for="producto">Producto</label>
                    <select name="producto_id" class="form-control">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                        @endforeach
                    </select><br>

                    <label for="proveedor">Proveedor</label>
                    <select name="proveedor_id" class="form-control">
                        @foreach ($proveedors as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select><br>

                </div>
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>

        </div>
    </div>
@stop
