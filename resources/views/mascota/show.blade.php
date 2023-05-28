@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
   Ficha Mascota
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-info card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset ('assets/img/perro2.jpg') }}" alt="User profile picture" style="width: 300px; height: 300px;">
              </div>
              <h3 class="profile-username text-center">{{ $m->nombre_mascota }}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Raza</b> <a class="float-right">{{$m->raza->raza_mascota }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Genero</b> <a class="float-right">{{ $m->genero_mascota->genero_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Tamaño</b> <a class="float-right">{{ $m->tamano->tamano_mascota }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Personalidad Mascota</b> <a class="float-right">{{ $m->personalidad_mascota->personalidad_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Fecha Nacimiento</b> <a class="float-right">{{ $m->fecha_nacimiento_mascota->format('d-m-Y') }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Comentario</b> <a class="float-right">{{ $m->comentario_mascota }}</a>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="{{ route('mascota.index') }}" class="btn btn-info"><i class="material-icons">volver</i></a>
                    <a href="" class="btn btn-success"><i class="material-icons">Historial Medico</i></a>
                </div>
            </div>
        </div>
    </div>




@endsection    


       

        
  