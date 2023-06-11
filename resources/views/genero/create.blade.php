@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Agregar Nuevo Género
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Agregar Género</li>
@endsection

@section('contenido')
    <div class="col-md-6 offset-md-1">
        <div class="card card-olive">
            <div class="card-header">
              <h3 class="card-title">Formulario Registro Género</h3>
            </div>
            <form method="POST" action="{{ route('genero.store')}}">
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label class="@error ('genero_mascota') text-danger @enderror" for="genero_mascota">Nombre de Género</label>
                  <input 
                  type="text" name='genero_mascota' 
                  class="form-control  @error ('genero_mascota') is-invalid @enderror" 
                  id="genero_mascota" 
                  placeholder="Ingrese un Género Mascota"
                  value="{{ old('genero_mascota') ?: $id->genero_mascota}}">
                  @error('genero_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Crear Género</button>
                </div>
            </div>
            </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-olive">
          <div class="card-header">
              <h3 class="card-title">Listado de Géneros</h3>
          </div>
          <div class="card-body p-0 m-0">
             <div class="table-responsive">
              <table class="table-table-hover table condensed text-center">
                  <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($generos as $genero)
                          <tr>
                              <td>{{ $genero->genero_mascota }}</td>
                              <td>
                                <a 
                                    href="{{ route('genero.edit', ['id'=>$genero->id] ) }}" 
                                    class="btn btn-success">
                                    <i class="material-icons">Editar</i>
                                </a>
                                @if( $genero->trashed())
                                  <a  
                                    href="{{ route('genero.restore', ['info'=>$genero->id]) }}" 
                                    class="btn btn-warning">
                                    <i class="material-icons">Restaurar</i>
                                  @else  
                                  <a 
                                    href="{{ route('genero.delete', ['info'=>$genero->id]) }}" 
                                    class="btn btn-danger delete-confirm">
                                    <i class="material-icons">Eliminar</i>
                                  </a>
                                @endif
                            </td>
                          </tr>
                       @endforeach   
                  </tbody>
              </table>
             </div> 
          </div>
      </div>
    </div>
@endsection