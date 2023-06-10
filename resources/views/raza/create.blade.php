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
    <div class="col-md-4">
      <div class="card card-lightblue ">
          <div class="card-header">
              <h3 class="card-title">Listado de Razas</h3>
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
                      @foreach($razas as $raza)
                          <tr>
                              <td>{{ $raza->raza_mascota }}</td>
                              <td>
                                <a href="{{ route('raza.edit', ['id'=>$raza->id])}}" 
                                  class="btn btn-success">
                                  <i class="material-icons">Editar</i>
                                </a>
                                @if( $raza->trashed())
                                  <a  
                                    href="{{ route('raza.restore', ['info'=>$raza->id]) }}" 
                                    class="btn btn-warning">
                                    <i class="material-icons">Restaurar</i>
                                  </a>
                                  @else  
                                  <a 
                                    href="{{ route('raza.delete', ['info'=>$raza->id]) }}" 
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