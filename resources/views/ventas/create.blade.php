<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    <h1>Nueva Venta</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ventas.store') }}" method="POST">
                @csrf
                <div class="form group">
                    <label for="producto">Producto</label>
                    <select name="producto_id" id="producto_id" class="form-control">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                        @endforeach
                    </select><br>
                        
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name="cantidad_producto" id="cantidad_producto" class="form-control"><br>
                    <label for="descripcion">descripcion de la venta</label>
                    <input type="text" name="descripcion" class="form-control" required><br>
                    <label for="precio">Precio Unitario</label>
                    <input type="number" step="0.01" min="0" name="precio_unitario" id="precio_unitario" class="form-control" ><br>
                    <label for="total">Monto Total de la venta venta realizada</label>
                    <input type="text" name="total_venta" id="total_venta" class="form-control"><br>
                    <label for="user">Vendedor</label>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                            @if ($user->isVenta())
                                {
                                <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                                }
                            @endif
                        @endforeach
                    </select><br>

                    <label for="user">Cliente</label>
                    <select name="cliente_id" class="form-control">
                        @foreach ($clientes as $cliente)
                            @if ($cliente->isClient())
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endif
                        @endforeach
                    </select><br>
                    

                </div>
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>

        </div>
    </div>
    <script src="{{ asset('dist/js/escucha.js') }}"></script>
    </x-auth-card>
</x-app-layout>
