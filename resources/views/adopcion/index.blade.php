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
                                <thead class="bg-pink">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Mascota</th>
                                        <th>Ciudad</th>
                                        <th>Fecha Adopción</th>
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adopciones as $adopcion)
                                    <tr>
                                        <td>{{ $adopcion -> id }}</td>
                                        <td>{{ $adopcion->usuario->nombre_usuario }}</td>
                                        <td>{{ $adopcion->mascota->nombre_mascota }}</td>
                                        <td>{{ $adopcion->nombre_cuidad }}</td>
                                        <td>{{ $adopcion->fecha_adopcion }}</td>
                                        <td>{{ $adopcion->descripcion_adopcion }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-end">
                {{$adopciones->links()}}
            </div> 
    </div>

@endsection