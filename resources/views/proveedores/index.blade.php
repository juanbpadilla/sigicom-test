<x-app-layout>
    <div class="card-header">
        <p class="h3 text-center">Proveedores</p>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-8">
        <a href="{{route('proveedores.create')}}" class="btn btn-primary mb-3">Nuevo Proveedor</a>
    </div>
    <div class="card">
        <div class="card body ml-2 mr-2">
            <table id="proveedores" class="table table striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Apellidos</th>
                        <th class="text-center">Direccion</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="text-center">{{ $proveedor -> id}}</td>
                            <td class="text-center">{{ $proveedor -> nombre_proveedor}}</td>
                            <td class="text-center">{{ $proveedor -> apellido_preveedor}}</td>
                            <td class="text-center">{{ $proveedor -> direccion_proveedor}}</td>
                            <td class="text-center">{{ $proveedor -> telefono}}</td>
                            <td class="text-center">{{ $proveedor -> correo}}</td>

                            <td class="text-center" width="170px">
                                <form action="{{route('proveedores.destroy',$proveedor)}}" method="POST">
                                    <a href="{{route('proveedores.edit',$proveedor)}}" class="btn btn-primary btn-sm">Editar</a>
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

