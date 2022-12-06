<x-app-layout>
    <div class="card-header">
        <p class="h3 text-center">Productos</p>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-8">
        <a href="{{route('roles.create')}}" class="btn btn-primary mb-3">Nuevo Producto</a>
    </div>
    <div class="card">
        <div class="card body ml-2 mr-2">
            <table id="producto" class="table table striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Precio de compra</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Proveedor</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="text-center">{{ $producto -> id}}</td>
                            <td class="text-center">{{ $producto -> nombre_producto}}</td>
                            <td class="text-center">{{ $producto -> precio_compra}}</td>
                            <td class="text-center">{{ $producto -> marca}}</td>
                            <td class="text-center">{{ $producto -> proveedor->nombre_proveedor}}</td>

                            <td class="text-center" width="170px">
                                <form action="{{route('productos.destroy',$producto)}}" method="POST">
                                    <a href="{{route('productos.edit',$producto)}}"" class="btn btn-primary btn-sm">Editar</a>
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

