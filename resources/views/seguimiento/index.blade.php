@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Información de Seguimientos Mascotas
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listado de Seguimientos</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-purple">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Mascota</th>
                                        <th>Adoptador</th>
                                        <th>Estado Mascota</th>
                                        <th>Fecha Seguimiento</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seguimientos as $seguimiento)
                                    <tr class="text-center">
                                        <td>{{ $seguimiento -> id }}</td>
                                        <td>{{ $seguimiento ->adopcion->mascota->nombre_mascota}}</td>
                                        <td>{{ $seguimiento ->adopcion->usuario->nombre_usuario}}</td>
                                        <td>{{ $seguimiento ->estado_mascota}}</td>
                                        <td>{{ $seguimiento ->fecha_seguimiento->format('d-m-Y')}}</td>
                                        <td>
                                            <a href="{{ route('seguimiento.show', ['seg'=>$seguimiento->id])}}" class="btn btn-info"><i class="material-icons">Ficha</i></a>
                                            <a href="{{ route('seguimiento.create')}}" class="btn btn-success"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('seguimiento.edit', ['seg'=>$seguimiento->id])}}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
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
          
            </div> 
    </div>

@endsection