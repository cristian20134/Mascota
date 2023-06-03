@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Información de Usuarios Registrados
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Listado de Usuario</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-danger">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Telefóno</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario -> id }}</td>
                                        <td>{{ $usuario -> rut_usuario }}</td>
                                        <td>{{ $usuario -> nombre_usuario }}</td>
                                        <td>{{ $usuario -> apellido_paterno}} {{$usuario-> apellido_materno}}</td>
                                        <td>{{ $usuario -> email_usuario }}</td>
                                        <td>{{ $usuario -> telefono_usuario }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('usuario.show', ['u'=>$usuario->id])}}" class="btn btn-info"><i class="material-icons">Ficha</i></a>
                                            <a href="{{ route('usuario.create')}}" class="btn btn-success"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('usuario.edit', ['u'=>$usuario->id])}}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
                                            <a href="{{ route('home')}}" class="btn btn-danger"><i class="material-icons">Eliminar</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-end">
                {{$usuarios->links()}}
            </div> 
    </div>

@endsection