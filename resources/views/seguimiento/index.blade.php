@extends('layouts.dashboard')

@section('titulo_seccion')
    Información Seguimientos de Mascotas
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active"> Seguimientos</li>
@endsection

@section('contenido')
    <div class="col-md-12">
            <div class="card">
                <div class="d-flex justify-content-between mt-3 mr-3">
                    <div class="card-header" >Listado de Seguimientos Mascotas</div>
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
                                <thead class="bg-purple">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Mascota</th>
                                        <th>Adoptador</th>
                                        <th>Estado Mascota</th>
                                        <th>Fecha Seguimiento</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seguimientos as $seguimiento)
                                    <tr class="text-center">
                                        <td>{{ $seguimiento -> id }}</td>
                                        <td>{{ $seguimiento ->adopcion->mascota->nombre_mascota}}</td>
                                        <td>{{ $seguimiento ->adopcion->usuario->nombre_usuario.' '.$seguimiento ->adopcion->usuario->apellido_paterno.' '.$seguimiento ->adopcion->usuario->apellido_materno}}</td>
                                        <td>{{ $seguimiento ->estado_mascota}}</td>
                                        <td>{{ $seguimiento ->fecha_seguimiento->format('d-m-Y')}}</td>
                                        <td>
                                            <a href="{{ route('seguimiento.show', ['seg'=>$seguimiento->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            {{-- <a href="{{ route('seguimiento.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a> --}}
                                            <a href="{{ route('seguimiento.edit', ['seg'=>$seguimiento->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>
                                            @if( $seguimiento->trashed())
                                            <a
                                                href="{{ route('seguimiento.restore', ['seg'=>$seguimiento->id]) }}"
                                                class="btn btn-warning"><i class="material-icons">Restaurar</i></a>
                                            @else
                                            <a
                                                href="{{ route('seguimiento.delete', ['seg'=>$seguimiento->id]) }}"
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
                    {{$seguimientos->links()}}
                </div>
    </div>
@endsection
