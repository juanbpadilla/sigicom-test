{{-- @extends('layouts.main')
@section('content') --}}
<x-app-layout>
    <div class="card-header">
        <p class="h3 text-center">Roles</p>
    </div>
    <br>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-8">
        <a href="{{route('roles.create')}}" class="btn btn-primary mb-3">Nuevo Rol</a>
    </div>
    <div class="card">
        <div class="card body ml-2 mr-2">
            <table id="productos" class="table table striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NOMBRE</th>
                        <th class="text-center">DISPLAY NAME</th>
                        <th class="text-center">DESCRIPCIÓN</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td class="text-center">{{ $rol -> id}}</td>
                            <td class="text-center">{{ $rol -> nombre}}</td>
                            <td class="text-center">{{ $rol -> display_name}}</td>
                            <td class="text-center">{{ $rol -> description}}</td>

                            <td class="text-center" width="170px">
                                <form action="{{route('roles.destroy',$rol->id)}}" method="POST">
                                    <a href="{{route('roles.edit',$rol->id)}}"" class="btn btn-primary btn-sm">Editar</a>
                                    @method('delete')
                                    @csrf
                                    {{-- <x-danger-button>{{ __('Delete') }}</x-danger-button> --}}
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
{{-- @endsection --}}

