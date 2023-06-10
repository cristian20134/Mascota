<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name= "csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo_pagina')</title>

    @include('layouts.lista-css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.fijos.navbar')
        @include('layouts.fijos.aside-bar')
        @include('layouts.fijos.titulo-pagina')
    
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

            @include('layouts.alertas.mensajes')

                <div class="row">
                    @yield('contenido')
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    
            <!-- /.content -->
    </div>
            <!-- /.content-wrapper -->

            @include('layouts.fijos.footer')
        </div>
    </div>
            @include('layouts.lista-js')
</body>

@include('layouts.sweetAlert.sweetAlert')

</html>