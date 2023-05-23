@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Agregar Personalidad Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Agregar Personalidad Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-8">
        <div class="card card-navy">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Personalidad</h3>
            </div>
            <form method="POST" action="{{ route('personalidad.store')}}">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label class="@error ('personalidad_mascota') text-danger @enderror" for="personalidad_mascota">Nombre de Raza</label>
                  <input 
                  type="text" name='personalidad_mascota' 
                  class="form-control  @error ('personalidad_mascota') is-invalid @enderror" 
                  id="personalidad_mascota" 
                  placeholder="Ingrese una Personalidad"
                  value="{{ old('personalidad_mascota') ?: $id->personalidad_mascota}}">
                  @error('personalidad_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Crear Personalidad</button>
                </div>
            </div>
            </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-navy">
        <div class="card-header">
          <h3 class="card-title">listado Personalidad de Mascota</h3>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($personalidades as $personalidad)
                <li class="py-1">{{ $personalidad->personalidad_mascota }}
                  <a href="{{ route('personalidad.edit',['id'=>$personalidad->id]) }}" 
                    class="btn btn-sm btn-success">
                    <i class="fas fa-pencil-alt"></i></a>
                  <a href="" 
                  class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                </li>
            @endforeach
          </ul>
        </div>
      </div>

    </div>

@endsection