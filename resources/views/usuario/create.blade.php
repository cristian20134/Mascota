@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Registrar Usuario
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Registro de Usuario</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Usuario</h3>
            </div>
            <form method="POST" action="{{ route('usuario.store')}}" enctype="multipart/form-data">
              <div class="card-body">
                @csrf

                <div class="form-group">
                  <label class="@error ('nombre_usuario') text-danger @enderror" for="nombre_usuario">Nombres</label>
                  <input
                  type="text" name='nombre_usuario'
                  class="form-control  @error ('nombre_usuario') is-invalid @enderror"
                  id="nombre_usuario"
                  placeholder="Ingrese Nombres"
                  value="{{ old('nombre_usuario') ?: ""}}">
                  @error('nombre_usuario')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label class="@error ('apellido_paterno') text-danger @enderror" for="apellido_paterno">Apellido Paterno</label>
                    <input
                    type="text"
                    name='apellido_paterno'
                    class="form-control @error ('apellido_paterno') is-invalid @enderror"
                    id="apellido_paterno"
                    placeholder="Ingrese Apellido Paterno"
                    value="{{ old('apellido_paterno') ?: ""}}">
                    @error('apellido_paterno')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('apellido_materno') text-danger @enderror" for="apelllido_materno">Apellido Materno</label>
                    <input
                    type="text"
                    name='apellido_materno'
                    class="form-control @error ('apellido_materno') is-invalid @enderror"
                    id="apellido_materno"
                    placeholder="Ingrese Apellido Materno"
                    value="{{ old('apellido_materno') ?: ""}}">
                    @error('apellido_materno')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('rut_usuario') text-danger @enderror" for="rut_usuario">Rut</label>
                    <input
                    type="text"
                    name='rut_usuario'
                    class="form-control @error ('rut_usuario') is-invalid @enderror"
                    id="rut_usuario"
                    placeholder="12345678-9"
                    value="{{ old('rut_usuario') ?: ""}}">
                    @error('rut_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('email_usuario') text-danger @enderror" for="email_usuario">Correo Electrónico</label>
                    <input
                    type="email"
                    name='email_usuario'
                    class="form-control @error ('email_usuario') is-invalid @enderror"
                    id="email_usuario"
                    placeholder="Ingrese Correo Electrónico"
                    value="{{ old('email_usuario') ?: ""}}">
                    @error('email_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('telefono_usuario') text-danger @enderror" for="telefono_usuario">Teléfono</label>
                    <input
                    type="tel"
                    name='telefono_usuario'
                    class="form-control @error ('telefono_usuario') is-invalid @enderror"
                    id="telefono_usuario"
                    placeholder="987654321"
                    value="{{ old('telefono_usuario') ?: ""}}">
                    @error('telefono_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('image_usuario') text-danger @enderror" for="image_usuario">Foto Perfil</label>
                    <input
                    type="file"
                    name='image_usuario'
                    class="form-control @error ('image_usuario') is-invalid @enderror"
                    id="image_usuario"
                    value="{{ old('image_usuario') ?: ""}}">
                    @error('image_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar Usuario</button>
                </div>
            </div>
            </form>
          </div>
    </div>
@endsection
