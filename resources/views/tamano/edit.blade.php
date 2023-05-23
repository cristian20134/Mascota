@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Editar Nueva Tamaño
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Editar Tamaño</li>
@endsection

@section('contenido')
    <div class="col-md-8">
        <div class="card card-indigo">
            <div class="card-header">
              <h3 class="card-title">Formulario de Edición Raza</h3>
            </div>
            <form method="POST" action="{{ route('tamano.update', ['id'=>$id->id])}}">
                <div class="card-body">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label class="@error ('tamano_mascota') text-danger @enderror" for="tamano_mascota">Nombre de Tamaño</label>
                    <input 
                    type="text" name='tamano_mascota' 
                    class="form-control  @error ('tamano_mascota') is-invalid @enderror" 
                    id="tamano_mascota" 
                    placeholder="Ingrese una Tamaño"
                    value="{{ old('tamano_mascota') ?: $id->tamano_mascota}}">
                    @error('tamano_mascota')
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
      <div class="card card-indigo">
        <div class="card-header">
          <h3 class="card-title">listado de tamano</h3>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($tamanos as $tamano)
                <li class="py-1">{{ $tamano->tamano_mascota }}
                  <a href="{{ route('tamano.edit',['id'=>$tamano->id]) }}" 
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