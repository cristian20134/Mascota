@extends('layouts.dashboard')

@section('titulo_seccion')
   Datos de Seguimiento Adopción
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Datos Seguimiento</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-purple card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset ('assets/img/seg.jpg') }}" alt="User profile picture" style="width: 300px; height: 300px;">
              </div>
              <h3 class="profile-username text-center"></h3>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                    <b>Nombre Mascota</b> <a class="float-right">{{ $seg->adopcion->mascota->nombre_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Nombre Adoptador</b> <a class="float-right">{{$seg->adopcion->usuario->nombre_usuario}} {{$seg->adopcion->usuario->apellido_paterno}} {{$seg->adopcion->usuario->apellido_materno}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Estado Mascota</b> <a class="float-right">{{ $seg->estado_mascota}}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Fecha Seguimiento</b> <a class="float-right">{{ $seg->fecha_seguimiento->format('d-m-Y')}}</a>
                    </li>
                    </li>
                    <li class="list-group-item">
                    <b>Descripción del Seguimiento</b> <a class="float-right text-justify mt-3">{{ $seg->descripcion_seguimiento}}</a>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="{{ route('usuario.show', ['u'=>$seg->id]) }}" class="btn btn-danger"><i class="material-icons">Datos Usuario</i></a>
                    <a href="{{ route('mascota.show', ['m'=>$seg->id]) }}" class="btn btn-info"><i class="material-icons">Datos Mascota</i></a>
                    <a href="{{ route('adopcion.show', ['info'=>$seg->id]) }}" class="btn btn-secondary"><i class="material-icons">Datos Adopción</i></a>
                    <a href="{{ route('seguimiento.index') }}" class="btn btn-success"><i class="material-icons">volver</i></a>
                </div>
            </div>
        </div>
    </div>
@endsection