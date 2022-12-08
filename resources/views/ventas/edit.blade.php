@extends('ventas.create')
@section('content')
    {{-- <h1>Editar Venta</h1>
    <div class="card">
        <div class="card-body"> --}}
            <form action="{{route('ventas.update', $ventas->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form group">
                <label for="fecha">Fecha de la venta</label>
                <input value="{{$ventas->fecha_venta}}" type="date" name="fecha_venta" class="form-control" required><br>
                <label for="cantidad">Cantidad de productos vendidos</label>
                <input value="{{$ventas->cantidad_producto}}" type="text" name="cantidad_producto" class="form-control" required><br>
                <label for="descripcion">descripcion de la venta</label>
                <input value="{{$ventas->descripcion}}" type="text" name="descripcion" class="form-control" required><br>
                <label for="precio">Precio Unitario</label>
                <input value="{{$ventas->precio_unitario}}" type="text" name="precio_unitario" class="form-control" required><br>
                <label for="total">Monto Total de la venta realizada</label>
                <input value="{{$ventas->total_venta}}" type="text" name="total_venta" class="form-control" required><br>

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

                <label for="producto">Producto</label>
                <select name="producto_id" class="form-control">
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select><br>

            </div>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
        </form>

    {{-- </div> --}}
{{-- </div> --}}
@stop

