@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Información de Adopciones
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Listado de Adopciones</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-pink">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Adoptador</th>
                                        <th>Mascota</th>
                                        <th>Ciudad</th>
                                        <th>Fecha Adopción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adopciones as $adopcion)
                                    <tr class="text-center">
                                        <td>{{ $adopcion -> id }}</td>
                                        <td>{{ $adopcion->usuario->nombre_usuario }}</td>
                                        <td>{{ $adopcion->mascota->nombre_mascota }}</td>
                                        <td>{{ $adopcion->nombre_cuidad }}</td>
                                        <td>{{ $adopcion->fecha_adopcion->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('adopcion.show', ['info'=>$adopcion->id])}}" class="btn btn-info"><i class="material-icons">Ficha</i></a>
                                            <a href="{{ route('adopcion.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('adopcion.edit', ['info'=>$adopcion->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>
                                            @if( $adopcion->trashed())
                                            <a
                                                href="{{ route('adopcion.restore', ['info'=>$adopcion->id]) }}"
                                                class="btn btn-warning"><i class="material-icons">Restaurar</i></a>
                                            @else
                                            <a
                                                href="{{ route('adopcion.delete', ['info'=>$adopcion->id]) }}"
                                                class="btn btn-danger"><i class="material-icons">Eliminar</i></a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-end">
                {{$adop->links()}}
            </div> 
    </div>

@endsection