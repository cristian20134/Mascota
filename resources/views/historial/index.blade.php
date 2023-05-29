@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Listado de Mascotas
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Mascotas</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-info">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Vacunas</th>
                                        <th>Enfermedades</th>
                                        <th>Comentarios</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historiales as $historial)
                                    <tr class="text-center">
                                        <td>{{ $historial ->id }}</td>
                                        <td>{{ $historial->vacuna }}</td>
                                        <td>{{ $historial->enfermedades}}</td>
                                        <td>{{ $historial->comentarios}}</td>
                                        <td>
                                            <a href="{{ route('historial.show', ['his'=>$historial->id])}}" class="btn btn-info"><i class="material-icons">Ficha</i></a>
                                            <a href="{{ route('historial.create')}}" class="btn btn-success"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('historial.edit', ['his'=>$historial->id])}}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
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
                {{$historiales->links()}}
            </div> 
    </div>

@endsection