@extends('layouts.dashboard')

@section('titulo_seccion')
    Información de Usuarios Registrados
@endsection

@section('breadcrumb')
<li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('contenido')
    <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Listado de Usuarios</div>
                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-condensed table-striped">
                                <thead class="bg-danger">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Foto Perfil</th>          
                                        <th>Nombres</th>
                                        <th>Apellidos</th>                             
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr class="text-center">
                                        <td>{{ $usuario ->id }}</td>
                                        <td><img src="{{asset($usuario->image_usuario) }}" width="60px" height="60px" class="rounded-circle"></td>
                                        <td>{{ $usuario ->nombre_usuario }}</td>
                                        <td>{{ $usuario ->apellido_paterno}} {{$usuario->apellido_materno}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('usuario.show', ['u'=>$usuario->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            <a href="{{ route('usuario.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a>
                                            <a href="{{ route('usuario.edit', ['u'=>$usuario->id])}}" class="btn btn-success"><i class="material-icons">Editar</i></a>

                                            @if( $usuario->trashed())
                                                <a
                                                    href="{{ route('usuario.restore', ['u'=>$usuario->id]) }}"
                                                    class="btn btn-warning"><i class="material-icons">Restaurar</i></a>
                                                @else
                                                <a
                                                    href="{{ route('usuario.delete', ['u'=>$usuario->id]) }}"
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
            <div class=" d-flex justify-content-end">
                {{$usuarios->links()}}
            </div>
    </div>
@endsection