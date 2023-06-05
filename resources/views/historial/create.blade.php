@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Historial Medico Macota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Registro Historial Medico Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-gray">
            <div class="card-header">
              <h3 class="card-title">Formulario Historial Medico Mascota</h3>
            </div>
            <form method="POST" action="{{ route('historial.store')}}">
              <div class="card-body">
                @csrf

                <div class="form-group">
                  <label class="@error ('nombre_ficha') text-danger @enderror" for="nombre_ficha">Ficha Nombre</label>
                  <input 
                  type="tel" 
                  name='nombre_ficha' 
                  class="form-control @error ('nombre_ficha') is-invalid @enderror" 
                  id="nombre_ficha" 
                  placeholder="Ingrese Ficha nombre"
                  value="{{ old('nombre_ficha') ?: ""}}">
                  @error('nombre_ficha')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('vacuna') text-danger @enderror" for="vacuna">Vacuna de Mascota</label>
                  <input 
                  type="tel" 
                  name='vacuna' 
                  class="form-control @error ('vacuna') is-invalid @enderror" 
                  id="vacuna" 
                  placeholder="Ingrese Vacuna"
                  value="{{ old('vacuna') ?: ""}}">
                  @error('vacuna')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('enfermedades') text-danger @enderror" for="enfermedades">Enfermedades de Mascota</label>
                  <input 
                  type="tel" 
                  name='enfermedades' 
                  class="form-control @error ('enfermedades') is-invalid @enderror" 
                  id="enfermedades" 
                  placeholder="Ingrese Enfermedades"
                  value="{{ old('enfermedades') ?: ""}}">
                  @error('enfermedades')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error('comentarios') text-danger @enderror" for="comentarios">Comentarios</label>
                  <textarea 
                  class="form-control @error ('comentarios') is-invalid @enderror" 
                  name="comentarios" 
                  id="comentarios" 
                  cols="30" rows="10" 
                  style="resize: none;"
                  >{{ old('comentarios') ?: ""}}</textarea>
                  @error('comentarios')
                  <span class="error invalid-feedback d-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Crear Historial Mascota</button>
                </div>
            </div>
            </form>
          </div>
    </div>

@endsection