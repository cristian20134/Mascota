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
    <div class="col-md-6 offset-md-1">
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
                    <button type="submit" class="btn btn-primary">Editar Tamaño</button>
                  </div>
              </div>
              </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-indigo">
          <div class="card-header">
              <h3 class="card-title">Listado de Tamaños</h3>
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
                      @foreach($tamanos as $tamano)
                          <tr>
                              <td>{{ $tamano->tamano_mascota }}</td>
                              <td>
                                <a 
                                    href="{{ route('tamano.edit', ['id'=>$tamano->id] ) }}" 
                                    class="btn btn-success">
                                    <i class="material-icons">Editar</i>
                                </a>
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



