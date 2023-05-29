@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Agregar Nueva Raza
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Agregar Raza</li>
@endsection

@section('contenido')
    <div class="col-md-6 offset-md-1">
        <div class="card card-lightblue">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Raza</h3>
            </div>
            <form method="POST" action="{{ route('raza.store')}}">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label class="@error ('raza_mascota') text-danger @enderror" for="raza_mascota">Nombre de Raza</label>
                  <input 
                  type="text" name='raza_mascota' 
                  class="form-control  @error ('raza_mascota') is-invalid @enderror" 
                  id="raza_mascota" 
                  placeholder="Ingrese una Raza"
                  value="{{ old('raza_mascota') ?: $id->raza_mascota}}">
                  @error('raza_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Crear Raza</button>
                </div>
            </div>
            </form>
          </div>
    </div>
    @include('raza.listas.listaRaza')
@endsection