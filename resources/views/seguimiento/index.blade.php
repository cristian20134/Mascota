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
                                <thead class="bg-purple">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Mascota</th>
                                        <th>Nombre Usuario</th>
                                        <th>Estado Mascota</th>
                                        <th>Fecha Seguimiento</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seguimientos as $s)
                                    <tr>
                                        <td>{{ $s -> id }}</td>
                                        <td>{{ $s ->adopcion->mascota->nombre_mascota}}</td>
                                        <td>{{ $s ->adopcion->usuario->nombre_usuario}}</td>
                                        <td>{{ $s ->estado_mascota}}</td>
                                        <td>{{ $s ->fecha_seguimiento}}</td>
                                        <td>{{ $s ->descripcion_seguimiento}}</td>                 
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-end">
          
            </div> 
    </div>

@endsection