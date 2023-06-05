@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Editar Nueva Personalidad
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Editar Personalidad de Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-6 offset-md-1">
        <div class="card card-navy">
            <div class="card-header">
              <h3 class="card-title">Formulario de Edición Personalidad Mascota</h3>
            </div>
            <form method="POST" action="{{ route('personalidad.update', ['id'=>$id->id])}}">
                <div class="card-body">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label class="@error ('personalidad_mascota') text-danger @enderror" for="personalidad_mascota">Nombre Personalidad Mascota</label>
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
                    <button type="submit" class="btn btn-primary">Editar Personalidad</button>
                  </div>
              </div>
              </form>
          </div>
    </div>

    <div class="col-md-4">
      <div class="card card-navy">
          <div class="card-header">
              <h3 class="card-title">Listado de Personalidades</h3>
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
                      @foreach($personalidades as $personalidad)
                          <tr>
                              <td>{{ $personalidad->personalidad_mascota }}</td>
                              <td>
                                <a 
                                    href="{{ route('personalidad.edit', ['id'=>$personalidad->id] ) }}" 
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