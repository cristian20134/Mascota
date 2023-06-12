@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Editar Historial Médico Macota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Editar Registro Historial Médico Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-gray">
            <div class="card-header">
              <h3 class="card-title">Editar Formulario Historial Médico Mascota</h3>
            </div>
            <form method="POST" action="{{ route('historial.update',['his'=>$his->id])}}">
              <div class="card-body">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label class="@error ('mascota') text-danger @enderror" for="mascota">Nombre Mascota</label>
                  <select name="mascota" id="mascota" class="form-control @error('mascota') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($mascotas as $mascota)
                    <option value="{{ $mascota->id }}"
                      {{ ( (int) old('mascota') === $mascota->id or (int) $his->mascota_id === $mascota->id )? 'selected' : ''}}>{{$mascota->nombre_mascota}}</option>
                    @endforeach
                  </select>
                   @error('mascota')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
              </div>

                <div class="form-group">
                  <label class="@error ('vacuna') text-danger @enderror" for="vacuna">Vacuna de Mascota</label>
                  <input 
                  type="tel" 
                  name='vacuna' 
                  class="form-control @error ('vacuna') is-invalid @enderror" 
                  id="vacuna" 
                  placeholder="Ingrese Vacuna"
                  value="{{ old('vacuna') ?: $his->vacuna}}">
                  @error('vacuna')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('enfermedades') text-danger @enderror" for="enfermedades">Enfermedades de Mascota</label>
                  <input 
                  type="tel" 
                  name='enfermedades' 
                  class="form-control @error ('enfermedades') is-invalid @enderror" 
                  id="enfermedades" 
                  placeholder="Ingrese Enfermedades"
                  value="{{ old('enfermedades') ?: $his->enfermedades}}">
                  @error('enfermedades')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error('comentarios') text-danger @enderror" for="comentarios">Comentarios</label>
                  <textarea 
                  class="form-control text-justify @error ('comentarios') is-invalid @enderror" 
                  name="comentarios" 
                  id="comentarios" 
                  cols="30" rows="07" 
                  style="resize: none;"
                  >{{ old('comentarios') ?: $his->comentarios}}</textarea>
                  @error('comentarios')
                  <span class="error invalid-feedback d-block">{{ $message }}</span>
                  @enderror
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Editar Historial Médico</button>
                </div>
            </div>
            </form>
          </div>
    </div>

@endsection