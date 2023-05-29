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
    <div class="col-md-6 offset-md-1">
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
                    <button type="submit" class="btn btn-primary">Editar Raza</button>
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
              <table class="table-table-hover table condensed">
                  <thead>
                      <tr class="text-center">
                          <th>Nombre</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($razas as $raza)
                          <tr class="text-center">
                              <td>{{ $raza->raza_mascota }}</td>
                              <td>
                                  <a 
                                      href="{{ route('raza.edit', ['id'=>$raza->id] ) }}" 
                                      class="btn btn-sm btn-success">
                                      <i class="fas fa-pencil-alt"></i>
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