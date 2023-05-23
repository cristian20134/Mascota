@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Agregar Nuevo Genero
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Agregar Genero</li>
@endsection

@section('contenido')
    <div class="col-md-8">
        <div class="card card-olive">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Genero</h3>
            </div>
            <form method="POST" action="{{ route('genero.store')}}">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label class="@error ('genero_mascota') text-danger @enderror" for="genero_mascota">Nombre de Genero</label>
                  <input 
                  type="text" name='genero_mascota' 
                  class="form-control  @error ('genero_mascota') is-invalid @enderror" 
                  id="genero_mascota" 
                  placeholder="Ingrese un Genero Mascota"
                  value="{{ old('genero_mascota') ?: $id->genero_mascota}}">
                  @error('genero_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Crear Genero Mascota</button>
                </div>
            </div>
            </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-olive">
        <div class="card-header">
          <h3 class="card-title">listado Generos de Macotas</h3>
        </div>
        <div class="card-body">
          <ul>
            @foreach ($generos as $genero)
                <li class="py-1">{{ $genero->genero_mascota }}
                  <a href="{{ route('genero.edit',['id'=>$genero->id]) }}" 
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