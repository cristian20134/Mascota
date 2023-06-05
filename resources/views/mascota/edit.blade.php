@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Editar Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Editar Registro de Mascota</li>
@endsection

@section('contenido')
    <div class="col-md-8 offset-md-2">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Formulario Edición Mascota</h3>
            </div>
            <form method="POST" action="{{ route('mascota.update', ['m'=>$m->id])}}">
              <div class="card-body">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label class="@error ('nombre_mascota') text-danger @enderror" for="nombre_mascota">Nombre Mascota</label>
                  <input 
                  type="text" name='nombre_mascota' 
                  class="form-control  @error ('nombre_mascota') is-invalid @enderror" 
                  id="nombre_mascota" 
                  placeholder="Ingrese nombre mascota"
                  value="{{ old('nombre_mascota') ?: $m->nombre_mascota}}">
                  @error('nombre_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label class="@error ('select_raza') text-danger @enderror" for="select_raza">Raza Mascota</label>
                    <select name="select_raza" id="select_raza" class="form-control @error('select_raza') is-invalid @enderror">
                      <option value="">Seleccione una Opción</option>
                      @foreach($razas as $r)
                      <option value="{{ $r->id }}"
                        {{ ( (int) old('select_raza') === $r->id or (int) $m->raza_id === $r->id) ? 'selected' : ''}}>{{$r->raza_mascota}}</option>
                      @endforeach
                    </select>
                     @error('select_raza')
                      <span class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('genero_mascota') text-danger @enderror" for="genero_mascota">Género Mascota</label>
                  <select name="genero_mascota" id="genero_mascota" class="form-control @error('genero_mascota') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($generos as $g)
                    <option value="{{$g->id}}"
                    {{ ( (int) old('genero_mascota') === $g->id or (int) $m->genero_mascota_id === $g->id)? 'selected' : ''}}>{{$g->genero_mascota}}</option>
                    @endforeach
                  </select>
                    @error('genero_mascota')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('tamano') text-danger @enderror" for="tamano">Tamaño Mascota</label>
                  <select name="tamano" id="tamano" class="form-control @error('tamano') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($tamanos as $tamano)
                    <option value="{{$tamano->id}}"
                    {{ ( (int) old('tamano') === $tamano->id or (int) $m->tamano_id === $m->id)? 'selected' : ''}}>{{$tamano->tamano_mascota}}</option>
                    @endforeach
                  </select>
                    @error('tamano')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('personalidad_mascota') text-danger @enderror" for="personalidad_mascota">Personalidad Mascota</label>
                  <select name="personalidad_mascota" id="personalidad_mascota" class="form-control @error('personalidad_mascota') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($personalidades as $p)
                    <option value="{{$p->id}}"
                    {{ ( (int) old('personalidad_mascota') === $p->id or (int) $m->personalidad_mascota_id === $m->id)? 'selected' : ''}}>{{$p->personalidad_mascota}}</option>
                    @endforeach
                  </select>
                    @error('personalidad_mascota')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('historial_medico') text-danger @enderror" for="historial_medico">Historial Medico Mascota</label>
                  <select name="historial_medico" id="historial_medico" class="form-control @error('historial_medico') is-invalid @enderror">
                    <option value="">Seleccione una Opción</option>
                    @foreach($historiales as $historial)
                    <option value="{{$historial->id}}"
                    {{ ( (int) old('historial_medico') === $historial->id or (int) $m->historial_medico_id === $historial->id )? 'selected' : ''}}>{{$historial->nombre_ficha}}</option>
                    @endforeach
                  </select>
                    @error('historial_medico')
                      <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label class="@error ('fecha_nacimiento_mascota') text-danger @enderror" for="fecha_nacimiento_mascota">Fecha Nacimiento Mascota</label>
                  <input 
                  type="date" name='fecha_nacimiento_mascota' 
                  class="form-control  @error ('fecha_nacimiento_mascota') is-invalid @enderror" 
                  id="fecha_nacimiento_mascota"
                  placeholder="Formato: aaaa-mm-dd"
                  value="{{ old('fecha_nacimiento_mascota') ?: $m->fecha_nacimiento_mascota->format('Y-m-d')}}">
                  @error('fecha_nacimiento_mascota')
                  <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="@error('comentario_mascota') text-danger @enderror" for="comentario_mascota">Comentarios</label>
                  <textarea 
                  class="form-control @error ('comentario_mascota') is-invalid @enderror" 
                  name="comentario_mascota" 
                  id="comentario_mascota" 
                  cols="30" rows="10" 
                  style="resize: none;"
                  >{{ old('comentario_mascota') ?: $m->comentario_mascota}}</textarea>
                  @error('comentario_mascota')
                  <span class="error invalid-feedback d-block">{{ $message }}</span>
                  @enderror
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Editar Mascota</button>
                </div>
            </div>
            </form>
          </div>
    </div>

@endsection