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
    <div class="col-md-10 offset-md-1">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Usuario</h3>
            </div>
            <form method="POST" action="{{ route('usuario.store')}}">
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
                    placeholder="Ingresar Apellido Paterno"
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
                    placeholder="Ingresar Apellido Materno"
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
                    placeholder="Ingresar Rut"
                    value="{{ old('rut_usuario') ?: ""}}">
                    @error('rut_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label class="@error ('email_usuario') text-danger @enderror" for="email_usuario">Correo Electronico</label>
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
                    <label class="@error ('telefono_usuario') text-danger @enderror" for="telefono_usuario">Telefono</label>
                    <input 
                    type="tel" 
                    name='telefono_usuario' 
                    class="form-control @error ('telefono_usuario') is-invalid @enderror" 
                    id="telefono_usuario" 
                    placeholder="Ingrese Telefono"
                    value="{{ old('telefono_usuario') ?: ""}}">
                    @error('telefono_usuario')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
              <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Crear Usuario</button>
                </div>
            </div>
            </form>
          </div>
    </div>

@endsection