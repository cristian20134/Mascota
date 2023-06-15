@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
   Datos Historial Médico Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Datos Historial Médico</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-gray card-outline">
            <div class="card-body box-profile">
              <div class="text-center mb-4">
                <img class="profile-user-img img-fluid img-circle" src="{{asset($his->mascota->image_mascota) }}" alt="User profile picture" style="width: 300px; height: 300px;">
              </div>
              <h3 class="profile-username text-center"></h3>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Nombre Mascota</b> <a class="float-right">{{ $his->mascota->nombre_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Vacunas</b> <a class="float-right">{{$his->vacuna}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Enfermedades</b> <a class="float-right">{{ $his->enfermedades}}</a>
                    </li>
                    <li class="list-group-item text-justify">
                    <b>Comentario</b> <a class="float-right">{{ $his->comentarios}}</a>
                    </li>
                </ul>
                <div class="text-center">
                    {{--<a href="{{ route('mascota.show', ['m'=>$his->id]) }}" class="btn btn-info"><i class="material-icons">Datos Mascota</i></a>--}}
                    <a href="{{ route('historial.index') }}" class="btn btn-success"><i class="material-icons">volver</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection