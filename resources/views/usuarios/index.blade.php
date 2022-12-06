{{-- @extends('layouts.app')
@section('content') --}}
<x-app-layout>
    {{-- <x-auth-session> --}}
        <div class="card-header">
            <p class="h3 text-center">Usuarios</p>
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mr-8">
            <a href="{{route('usuarios.create')}}" class="btn btn-primary mb-3">Nuevo Usuario</a>
        </div>
        <div class="card">
            <div class="card body">
                <table id="usuarios" class="table mt-4 ml-2 mr-2">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Apellidos</th>
                            <th class="text-center">Rol</th>
                            <th class="text-center">Telefono</th>
                            <th class="text-center">email</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="{{ $user -> estado ? '' : 'table-danger'}}">
                                <td class="text-center">{{ $user -> id}}</td>
                                <td class="text-center">{{ $user -> name}}</td>
                                <td class="text-center">{{ $user -> apellidos}}</td>
                                <td class="text-center">
                                    @foreach($user->roles as $role)
                                        {{ $role->display_name }}                                    
                                    @endforeach
                                </td>
                                <td class="text-center">{{ $user -> telefono}}</td>
                                <td class="text-center">{{ $user -> email}}</td>
                                <td class="text-center"><p class="text-center text-{{ $user -> estado ? 'success' : 'danger'}}">{{ $user -> estado ? 'ACTIVO' : 'INACTIVO'}}</p></td>
                                {{-- <td width="170px">
                                    <form action="{{route('usuarios.destroy',$user->id)}}" method="POST">
                                        <a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-sm btn-primary">Editar</a>
                                        @method('delete')
                                        @csrf
                                        {{-- <input type="submit" value="Eliminar" class="btn btn-danger btn-sm"> --}}
                                        {{-- <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button> --}}
                                    {{-- </form> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </x-auth-session> --}}
</x-app-layout>
{{-- @endsection --}}
