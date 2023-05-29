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
                                        <th>Nombre Mascota</th>
                                        <th>Raza</th>
                                        <th>Genero</th>
                                        <th>Tamaño</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mascotas as $mascota)
                                    <tr class="text-center">
                                        <td>{{ $mascota -> id }}</td>
                                        <td>{{ $mascota->nombre_mascota }}</td>
                                        <td>{{ $mascota->raza->raza_mascota }}</td>
                                        <td>{{ $mascota->genero_mascota->genero_mascota }}</td>
                                        <td>{{ $mascota->tamano->tamano_mascota }}</td>
                                        <td>
                                            <a href="{{ route('mascota.show', ['m'=>$mascota->id])}}" class="btn btn-info"><i class="material-icons">Ficha</i></a>
                                            <a href="{{ route('mascota.create')}}" class="btn btn-success"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('mascota.edit', ['m'=>$mascota->id])}}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
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
                {{$mascotas->links()}}
            </div> 
    </div>

@endsection