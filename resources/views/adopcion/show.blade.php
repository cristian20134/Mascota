@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
   Datos de Adopción
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-pink card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset ('assets/img/adopcion3.jpg') }}" alt="User profile picture" style="width: 300px; height: 300px;">
              </div>
              <h3 class="profile-username text-center"></h3>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Persona Responsable</b> <a class="float-right">{{$info->usuario->nombre_usuario}} {{$info->usuario->apellido_paterno}} {{$info->usuario->apellido_materno}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Nombre Mascota</b> <a class="float-right">{{ $info->mascota->nombre_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Ciudad</b> <a class="float-right">{{ $info->nombre_cuidad}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Dirección</b> <a class="float-right">{{ $info->direccion_adopcion}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Fecha Adopción</b> <a class="float-right">{{ $info->fecha_adopcion->format('d-m-Y')}}</a>
                    </li>
                    </li>
                    <li class="list-group-item text-justify">
                    <b>Descripción</b> <a class="float-right">{{ $info->descripcion_adopcion}}</a>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="{{ route('usuario.show', ['u'=>$info->id]) }}" class="btn btn-danger"><i class="material-icons">Datos Usuario</i></a>
                    <a href="{{ route('mascota.show', ['m'=>$info->id]) }}" class="btn btn-info"><i class="material-icons">Datos Mascota</i></a>
                    <a href="{{ route('adopcion.index') }}" class="btn btn-success"><i class="material-icons">volver</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection