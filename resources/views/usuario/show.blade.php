@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
   Datos del Usuario
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Datos del Usuario</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-danger card-outline">
            <div class="card-body box-profile">
              <div class="text-center mb-3">
                <img class="profile-user-img img-fluid img-circle" src="{{asset($u->image_usuario) }}" alt="User profile picture" style="width: 300px; height: 300px;">
              </div>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Nombres</b> <a class="float-right">{{$u->nombre_usuario}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Apellidos</b> <a class="float-right">{{ $u->apellido_paterno}} {{ $u->apellido_materno }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Rut</b> <a class="float-right">{{ $u->rut_usuario}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Correo Electrónico</b> <a class="float-right">{{ $u->email_usuario}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Teléfono</b> <a class="float-right">{{ $u->telefono_usuario }}</a>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="{{ route('usuario.index') }}" class="btn btn-success"><i class="material-icons">volver</i></a>
                    {{--  <a href="{{ route('adopcion.show', ['info'=>$u->id]) }}" class="btn btn-info"><i class="material-icons">Datos Adopción</i></a>--}}
                </div>
            </div>
        </div>
    </div>
@endsection  