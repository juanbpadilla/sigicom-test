@extends('layouts.main')
@section('content')
    <h1>Nuevo Usuario</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('usuarios.store')}}" method="POST">
            @csrf
            <div class="form group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Escriba su nombre" required><br>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" class="form-control" placeholder="Escriba sus apellidos" required><br>
                <label for="rol">Rol</label>
                <select name="rol_id" class="form-control">
                @foreach ( $roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                @endforeach
                </select><br>
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" placeholder="Escriba su direccion" required><br>
                <label for="genero">Genero</label>
                <input type="text" name="genero" class="form-control" placeholder="Escriba su genero" required><br>
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Escriba su telefono" required><br>
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Escriba su email" required><br>
                <label for="password">Password</label>
                <input type="text" name="password" class="form-control" required><br>

            </div>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>

        </div>
    </div>
@stop
