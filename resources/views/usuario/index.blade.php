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
                <div class="d-flex justify-content-between mt-3 mr-3">
                    <div class="card-header" >Listado de Usuarios</div>
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
                                <thead class="bg-danger">
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Foto Perfil</th>
                                        <th>Nombre Completo</th>
                                        <th>Correo Electronico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr class="text-center">
                                        <td>{{ $usuario ->id }}</td>
                                        <td><img src="{{asset($usuario->image_usuario) }}" width="75px" height="60px" class="rounded-circle"></td>
                                        <td>{{ $usuario ->nombre_usuario.' '.$usuario ->apellido_paterno.' '.$usuario->apellido_materno }}</td>
                                        <td>{{$usuario ->email_usuario}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('usuario.show', ['u'=>$usuario->id])}}" class="btn btn-info"><i class="material-icons">Datos</i></a>
                                            {{--<a href="{{ route('usuario.create')}}" class="btn btn-primary"><i class="material-icons">Crear</i></a>--}}
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
            <div class=" d-flex justify-content-start">
                {{$usuarios->links()}}
            </div>
    </div>
@endsection
