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
                                        <th>rut</th>
                                        <th>Nombres</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Correo</th>
                                        <th>telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuario as $u)
                                    <tr>
                                        <td>{{ $u -> id }}</td>
                                        <td>{{ $u -> rut_usuario }}</td>
                                        <td>{{ $u -> nombre_usuario }}</td>
                                        <td>{{ $u -> apellido_paterno }}</td>
                                        <td>{{ $u -> apellido_materno }}</td>
                                        <td>{{ $u -> email_usuario }}</td>
                                        <td>{{ $u -> telefono_usuario }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div>
@endsection