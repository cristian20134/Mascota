@extends('layouts.dashboard')

@section('titulo_seccion')
    Información de Mascotas
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Mascotas</li>
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="d-flex justify-content-between mt-3 mr-3">
                    <div class="card-header" >Listado de Mascotas</div>
                    <div>
                        <form method="GET" class="d-flex justify-content-end ">
                            <input class="form-control me-2 mr-1" type="search" placeholder="Buscar" name="search">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-info">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Foto Mascota</th>
                                        <th>Nombre Mascota</th>
                                        <th>Raza</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mascotas as $mascota)
                                    <tr class="text-center">
                                        <td>{{ $mascota -> id }}</td>
                                        <td><img src="{{asset($mascota->image_mascota) }}" width="70px" height="60px" class="rounded-circle"></td>
                                        <td>{{ $mascota->nombre_mascota }}</td>
                                        <td>{{ $mascota->raza->raza_mascota }}</td>
                                        <td>
                                            <a href="{{ route('mascota.show', ['m'=>$mascota->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            {{-- <a href="{{ route('mascota.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a> --}}
                                            <a href="{{ route('mascota.edit', ['m'=>$mascota->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>
                                            @if( $mascota->trashed())
                                            <a
                                                href="{{ route('mascota.restore', ['m'=>$mascota->id]) }}"
                                                class="btn btn-warning"><i class="material-icons">Restaurar</i></a>
                                            @else
                                            <a
                                                href="{{ route('mascota.delete', ['m'=>$mascota->id]) }}"
                                                class="btn btn-danger delete-confirm"><i class="material-icons">Eliminar</i></a>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-start">
                {{$mascotas->links()}}
            </div>
    </div>
@endsection
