@extends('layouts.dashboard')

@section('titulo_seccion')
    Información de Adopciones
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Adopción</li>
@endsection

@section('contenido')
    <div class="col-md-12">
            <div class="card">
                <div class="d-flex justify-content-between mt-3 mr-3">
                    <div class="card-header" >Listado de Adopciones</div>
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
                                <thead class="bg-pink">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Persona Responsable</th>
                                        <th>Nombre Mascota</th>
                                        <th>Fecha Adopción</th>
                                        <th>Acciones</th>
                                        <th>Documento Adopción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adopciones as $adopcion)
                                    <tr class="text-center">
                                        <td>{{ $adopcion -> id }}</td>
                                        <td class="text-left">{{ $adopcion->usuario->nombre_usuario.' '.$adopcion->usuario->apellido_paterno.' '.$adopcion->usuario->apellido_materno}}</td>
                                        <td>{{ $adopcion->mascota->nombre_mascota }}</td>
                                        <td>{{ $adopcion->fecha_adopcion->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('adopcion.show', ['info'=>$adopcion->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            {{--<a href="{{ route('adopcion.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a>--}}
                                            <a href="{{ route('adopcion.edit', ['info'=>$adopcion->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>
                                            @if( $adopcion->trashed())
                                            <a
                                                href="{{ route('adopcion.restore', ['info'=>$adopcion->id]) }}"
                                                class="btn btn-warning"><i class="material-icons">Restaurar</i></a>
                                            @else
                                            <a
                                                href="{{ route('adopcion.delete', ['info'=>$adopcion->id]) }}"
                                                class="btn btn-danger delete-confirm"><i class="material-icons">Eliminar</i></a>
                                        @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('adopcion.pdf', ['info'=>$adopcion->id])}}" class="btn btn-primary"><i class="material-icons">Ver</i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <div class=" d-flex justify-content-start">
                {{$adopciones->links()}}
            </div>
    </div>

@endsection
