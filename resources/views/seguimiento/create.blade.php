@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Seguimiento Adopción de Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Registro Seguimiento Adopción de Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-purple">
            <div class="card-header">
              <h3 class="card-title">Registro Seguimiento Adopción de Mascota</h3>
            </div>
            <form method="POST" action="{{ route('seguimiento.store')}}">
              <div class="card-body">
                @csrf

                <div class="form-group">
                  <label class="@error ('select_seguimiento') text-danger @enderror" for="select_mascota">Persona Responsable - Mascota</label>
                  <select name="select_seguimiento" id="select_seguimiento" class="form-control @error('select_seguimiento') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($adopciones as $a)
                    <option value="{{$a->id}}"
                    {{ (int) old('select_seguimiento') === $a->id ? 'selected' : ''}}>{{$a->usuario->nombre_usuario.' '.$a->usuario->apellido_paterno.' '.$a->usuario->apellido_materno.' - '.$a->mascota->nombre_mascota}}</option>
                    @endforeach
                  </select>
                    @error('select_seguimiento')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('estado_mascota') text-danger @enderror" for="estado_mascota">Estado Mascota</label>
                  <input 
                  type="text" name='estado_mascota' 
                  class="form-control  @error ('estado_mascota') is-invalid @enderror" 
                  id="estado_mascota" 
                  placeholder="Ingrese Estado Mascota"
                  value="{{ old('estado_mascota') ?: ""}}">
                  @error('estado_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

                <div class="form-group">
                  <label class="@error ('fecha_seguimiento') text-danger @enderror" for="fecha_seguimiento">Fecha Seguimiento Mascota</label>
                  <input 
                  type="date" name='fecha_seguimiento' 
                  class="form-control  @error ('fecha_seguimiento') is-invalid @enderror" 
                  id="fecha_seguimiento"
                  placeholder="Formato: aaaa-mm-dd"
                  value="{{ old('fecha_seguimiento') ?: ""}}">
                  @error('fecha_seguimiento')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error('descripcion_seguimiento') text-danger @enderror" for="descripcion_seguimiento">Comentario Seguimiento Mascota</label>
                  <textarea class="form-control text-justify @error ('descripcion_seguimiento') is-invalid @enderror" 
                  name="descripcion_seguimiento" id="descripcion_seguimiento" 
                  cols="30" rows="07" 
                  style="resize: none;"
                  >{{ old('descripcion_seguimiento') ?: ""}}</textarea>
                  @error('descripcion_seguimiento')
                  <span class="error invalid-feedback d-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar Seguimiento</button>
                </div>
            </div>
            </form>
          </div>
    </div>
@endsection