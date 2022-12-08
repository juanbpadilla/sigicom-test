<x-app-layout>
    {{-- <x-auth-session> --}}
    <div class="card-header">
        <p class="h3 text-center">Compras</p>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-3">
        <a href="{{route('compras.create')}}" class="btn btn-primary mb-3">Nueva Compra</a>
    </div>
    <div class="card mt-4 ml-2 mr-2">
        <div class="card body">
            <table id="compra" class="table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Compra</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                        <th>Descripcion</th>
                        <th>Responsable</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra -> id}}</td>
                            <td>{{ $compra -> fecha}}</td>
                            <td>{{ $compra -> cantidad}}</td>
                            <td>{{ $compra -> precio}}</td>
                            <td>{{ $compra -> total}}</td>
                            <td>{{ $compra -> descripcion}}</td>
                            <td>{{ $compra -> user->name}}</td>
                            <td>{{ $compra -> producto->nombre_producto}}</td>
                            <td>{{ $compra -> proveedor->nombre_proveedor}}</td>

                            <td width="170px">
                                <form action="{{route('compras.destroy', $compra->id)}}" method="POST">
                                    <a href="{{route('compras.edit', $compra->id)}}" class="btn btn-primary btn-sm">Editar</a>
                                    @method('delete')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn bg-red-600 border border-transparent font-semibold text-white uppercase btn-sm">
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
        $(document).ready(function () {
            $('#productos').DataTable({
                "language" : {
                    "search" : "Buscar",
                    "lengthMenu" : "Mostrar _MENU_ registros por pagina",
                    "info" : "Mostrando pagina _PAGE_ de _PAGES_",
                    "paginate" : {
                        "previous" : "Anterior",
                        "next" : "Siguiente",
                        "first" : "primero",
                        "last" : "Ultimo"
                    }
                }
            });
        });
    </script>

@endsection

