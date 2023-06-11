@extends('layouts.dashboard')

@section('titulo_seccion')
    Adminitración General 
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Menú Principal</li>
@endsection

@section('contenido')
<div class="container-fluid menu-imagen">
  <div class="col-md-9 offset-md-2 mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" >
              <div class="card shadow-lg p-3 mb-5 rounded-circle logo" style="width: 210px; height: 210px;">
                <img  class=" mx-auto"  src="{{ asset ('assets/img/usuario.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                <div class="card-body text-center">
                  <a href="{{ route('usuario.index') }}" class="btn btn-danger">Usuarios</a>
                </div>
              </div>
            </div>

            <div class="col">
                <div class="card shadow-lg p-3 mb-5 rounded-circle" style="width: 210px; height: 210px;">
                  <img  class="mx-auto"  src="{{ asset ('assets/img/mascota.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('mascota.index') }}" class="btn btn-info">Mascotas</a>
                  </div>
                </div>
            </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 rounded-circle" style="width: 210px; height: 210px;">
                  <img  class="mx-auto"  src="{{ asset ('assets/img/adopcion2.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('adopcion.index') }}" class="btn bg-pink">Adopciones</a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 rounded-circle" style="width: 210px; height: 210px;">
                  <img  class="mx-auto"  src="{{ asset ('assets/img/se.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('seguimiento.index') }}" class="btn bg-purple">Seguimientos</a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card shadow-lg p-3 mb-5 rounded-circle" style="width: 210px; height: 210px;">
                  <img  class="mx-auto"  src="{{ asset ('assets/img/h.png') }}" alt="User profile picture" style="width: 110px; height: 110px;">
                  <div class="card-body text-center">
                    <a href="{{ route('historial.index') }}" class="btn bg-gray">Historial Medico</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
    
@endsection

