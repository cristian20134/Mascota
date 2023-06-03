@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Adopción de Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Formulario Adopción de Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
        <div class="card card-pink">
            <div class="card-header">
              <h3 class="card-title">Formulario Adopción de Mascota</h3>
            </div>
            <form method="POST" action="{{ route('adopcion.store')}}">
              <div class="card-body">
                @csrf

                <div class="form-group">
                    <label class="@error ('select_usuario') text-danger @enderror" for="select_usuario">Persona Responsable</label>
                    <select name="select_usuario" id="select_usuario" class="form-control @error('select_usuario') is-invalid @enderror">
                      <option value="">Seleccione una Opción</option>
                      @foreach($usuarios as $u)
                      <option value="{{ $u->id }}"
                        {{ (int) old('select_usuario') === $u->id ? 'selected' : ''}}>{{$u->nombre_usuario}}</option>
                      @endforeach
                    </select>
                     @error('select_usuario')
                      <span class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('select_mascota') text-danger @enderror" for="select_mascota">Mascota</label>
                  <select name="select_mascota" id="select_mascota" class="form-control @error('select_mascota') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($mascotas as $m)
                    <option value="{{$m->id}}"
                    {{ (int) old('select_mascota') === $m->id ? 'selected' : ''}}>{{$m->nombre_mascota}}</option>
                    @endforeach
                  </select>
                    @error('select_mascota')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="@error ('nombre_cuidad') text-danger @enderror" for="nombre_cuidad">Ciudad</label>
                    <input 
                    type="text" name='nombre_cuidad' 
                    class="form-control  @error ('nombre_cuidad') is-invalid @enderror" 
                    id="nombre_cuidad" 
                    placeholder="Ingrese Comuna"
                    value="{{ old('nombre_cuidad') ?: ""}}">
                    @error('nombre_cuidad')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('fecha_adopcion') text-danger @enderror" for="fecha_adopcion">Fecha Adopción Mascota</label>
                  <input 
                  type="date" name='fecha_adopcion' 
                  class="form-control  @error ('fecha_adopcion') is-invalid @enderror" 
                  id="fecha_adopcion"
                  placeholder="Formato: aaaa-mm-dd"
                  value="{{ old('fecha_adopcion') ?: ""}}">
                  @error('fecha_adopcion')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error('descripcion_adopcion') text-danger @enderror" for="descripcion_adopcion">Descripcion Adopción</label>
                  <textarea 
                  class="form-control @error ('descripcion_adopcion') is-invalid @enderror" 
                  name="descripcion_adopcion" 
                  id="descripcion_adopcion" 
                  cols="30" rows="10" 
                  style="resize: none;"
                  >{{ old('descripcion_adopcion') ?: ""}}</textarea>
                  @error('descripcion_adopcion')
                  <span class="error invalid-feedback d-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Adopción Mascota</button>
                </div>
            </div>
            </form>
          </div>
    </div>

@endsection