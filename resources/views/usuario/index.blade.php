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
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Usuario</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-danger">
                                    <tr>
                                        <th>#</th>
                                        <th>Rut</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Correo</th>
                                        <th>Telefóno</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $u)
                                    <tr>
                                        <td>{{ $u -> id }}</td>
                                        <td>{{ $u -> rut_usuario }}</td>
                                        <td>{{ $u -> nombre_usuario }}</td>
                                        <td>{{ $u -> apellido_paterno}} {{$u-> apellido_materno}}</td>
                                        <td>{{ $u -> email_usuario }}</td>
                                        <td>{{ $u -> telefono_usuario }}</td>
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