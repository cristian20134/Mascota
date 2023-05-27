 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset ('assets/img/logo3.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Adm Adopción</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-4 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset ('assets/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p> Inicio</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usuario.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Crear Usuario</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mascota.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-paw"></i>
                    <p>Crear Mascota</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adopcion.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>Adopción de Mascota</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-walking"></i>
                    <p>Seguimiento Adopción</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('historial.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-notes-medical"></i>
                    <p>Crear Historial Medico</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('raza.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-dog"></i>
                    <p>Agregar Raza</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tamano.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-ruler"></i>
                    <p>Agregar Tamaño</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('genero.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-venus-mars"></i>
                    <p>Agregar Genero</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('personalidad.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-laugh"></i>
                    <p>Agregar Personalidad</p>   
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Cerrar Sesión</p>   
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


                                  