@extends('layouts.dashboard')

@section('titulo_seccion')
    Información Historial Medico Mascota
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Historial Médico</li>
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="d-flex justify-content-between mt-3 mr-3">
                    <div class="card-header" >Listado Historial Medico de Mascotas</div>
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
                                <thead class="bg-gray">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Nombre Mascota</th>
                                        <th>Vacunas</th>
                                        <th>Enfermedades</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($historiales as $historial)
                                    <tr class="text-center">
                                        <td>{{ $historial ->id }}</td>
                                        <td>{{ $historial ->mascota->nombre_mascota }}</td>
                                        <td>{{ $historial->vacuna }}</td>
                                        <td>{{ $historial->enfermedades}}</td>
                                        <td>
                                            <a href="{{ route('historial.show', ['his'=>$historial->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            {{-- <a href="{{ route('historial.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a> --}}
                                            <a href="{{ route('historial.edit', ['his'=>$historial->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>

                                            @if( $historial->trashed())
                                            <a
                                                href="{{ route('historial.restore', ['his'=>$historial->id]) }}"
                                                class="btn btn-warning"><i class="material-icons">Restaurar</i>
                                            </a>
                                            @else
                                            <a
                                                href="{{ route('historial.delete', ['his'=>$historial->id]) }}"
                                                class="btn btn-danger delete-confirm"><i class="material-icons">Eliminar</i>
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
            <div class=" d-flex justify-content-start">
                {{$historiales->links()}}
            </div>
    </div>

@endsection
