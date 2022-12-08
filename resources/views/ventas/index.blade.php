<x-app-layout>
    {{-- <x-auth-session> --}}
    <div class="card-header">
        <p class="h3 text-center">Ventas</p>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-3">
        <a href="{{route('ventas.create')}}" class="btn btn-primary mb-6">VENDER</a>
    </div>
    <div class="card mt-4 ml-2 mr-2">
        <div class="card body">
            <table id="venta" class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cantidad de producto</th>
                        <th>Descripcion</th>
                        <th>Precio U.</th>
                        <th>Monto Total</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta -> id }}</td>
                            <td>{{ $venta -> fecha_venta }}</td>
                            <td>{{ $venta -> cantidad_producto }}</td>
                            <td>{{ $venta -> descripcion }}</td>
                            <td>{{ $venta -> precio_unitario }}</td>
                            <td>{{ $venta -> total_venta }}</td>
                            <td>{{ $venta-> user ->nombre}}</td>
                            <td>{{ $venta-> cliente ->nombre}}</td>
                            <td>{{ $venta-> producto->nombre_producto}}</td>

                            <td width="150px">
                                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST">
                                    <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                "language": {
                    "search": "Buscar",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Siguiente",
                        "first": "primero",
                        "last": "Ultimo"
                    }
                }
            });
        });
    </script>

@endsection
