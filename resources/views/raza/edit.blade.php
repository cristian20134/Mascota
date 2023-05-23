@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Editar Nueva Raza
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Editar Raza</li>
@endsection

@section('contenido')
    <div class="col-md-8">
        <div class="card card-lightblue">
            <div class="card-header">
              <h3 class="card-title">Formulario de Edición Raza</h3>
            </div>
            <form method="POST" action="{{ route('raza.update', ['id'=>$id->id])}}">
                <div class="card-body">
                  @csrf
                  @method('PUT')
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
                    <button type="submit" class="btn btn-primary">Editar</button>
                  </div>
              </div>
              </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-lightblue">
        <div class="card-header">
          <h3 class="card-title">listado de razas</h3>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($razas as $raza)
                <li class="py-1">{{ $raza->raza_mascota }}
                  <a href="{{ route('raza.edit',['id'=>$raza->id]) }}" 
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