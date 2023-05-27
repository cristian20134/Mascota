@extends('layouts.dashboard')

@section('titulo_pagina')
    Adopcion | Home
@endsection

@section('titulo_seccion')
    Inicio
@endsection

@section('breadcrumb')
{{-- <li class="breadcrumb-item active">Starter Page</li> --}}
@endsection

@section('contenido')
    <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">Administración Principal</div>
                <div class="table-responsive">
                    <table class="table table-hover table-condensed table-striped">
                        <thead class="bg-black">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="{{ route('usuario.index') }}" class="nav-link bg-danger btn-lg">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p class="text-center">Usuario</p>  
                                        </a>
                                </td>
                                <td>
                                    <a href="{{ route('usuario.index') }}" class="nav-link bg-info btn-lg">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p class="text-center">Mascota</p>  
                                    </a></td>
                                <td>
                                    <a href="{{ route('usuario.index') }}" class="nav-link bg-success btn-lg">
                                    <i class="nav-icon fas fa-heart"></i>
                                    <p class="text-center">Adopción</p>  
                                    </a></td>
                                <td>
                                    <a href="{{ route('usuario.index') }}" class="nav-link bg-success btn-lg">
                                    <i class="nav-icon fas fa-walking"></i>
                                    <p class="text-center">Seguimiento</p>  
                                    </a></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
    </div>

@endsection

