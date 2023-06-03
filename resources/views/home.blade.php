@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Inicio
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-9 offset-md-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" >
              <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 250px; height: 250px;">
                <img  class="mt-5 mx-auto"  src="{{ asset ('assets/img/usuario.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                <div class="card-body text-center">
                  <a href="{{ route('usuario.index') }}" class="nav-link bg-danger btn-lg">Usuarios</a>
                </div>
              </div>
            </div>

            <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 250px; height: 250px;">
                  <img  class="mt-5 mx-auto"  src="{{ asset ('assets/img/mascota.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('mascota.index') }}" class="nav-link bg-info btn-lg">Mascotas</a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded " style="width: 250px; height: 250px;">
                  <img  class="mt-5 mx-auto"  src="{{ asset ('assets/img/adopcion2.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('adopcion.index') }}" class="nav-link bg-pink btn-lg">Adopciones</a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 250px; height: 250px;">
                  <img  class="mt-5 mx-auto"  src="{{ asset ('assets/img/se.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('seguimiento.index') }}" class="nav-link bg-purple btn-lg">Seguimientos</a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 250px; height: 250px;">
                  <img  class="mt-5 mx-auto"  src="{{ asset ('assets/img/h.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('historial.index') }}" class="nav-link bg-gray btn-lg">Historial Medico</a>
                  </div>
                </div>
              </div>
  


        </div>
    </div>
@endsection

