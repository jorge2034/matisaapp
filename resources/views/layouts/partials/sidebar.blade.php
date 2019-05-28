<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('escritorio')}}" class="brand-link">
        <center> <img src="{{asset("img/logo.png")}}" alt="MATISA AUTOS SRL" class="logo-sidebar elevation-5"
                    ></center>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"> {{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--BOTONES EXAMPLE--}}
                {{--<li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Starter Pages
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>--}}
                {{--Dashboard--}}
                <li class="nav-item">
                    <a href="{{route('escritorio')}}" class="nav-link {{active('escritorio')}}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Escritorio
                        </p>
                    </a>
                </li>
                {{--configuracion del sistema--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>
                            Configuración
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('empresas.index')
                        <li class="nav-item">
                            <a href="{{route('config.empresas.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Empresa</p>
                            </a>
                        </li>
                        @endcan
                        @can('users.index')
                        <li class="nav-item">
                            <a href="{{route('config.users.index')}}" class="nav-link {{active('config.users.index')}}">
                                <i class="fa fa-user nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="nav-item">
                            <a href="{{route('config.roles.index')}}" class="nav-link {{active('config.roles.index')}}">
                                <i class="fa fa-rupee nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                {{--parametros del sistema--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>

                        <p>
                            Parámetros
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('monedas.index')
                        <li class="nav-item">
                            <a href="{{route('parametros.monedas.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>General - Monedas</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>otro</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--modulo inventarios --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>

                        <p>
                            Inventarios
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('monedas.index')
                        <li class="nav-item">
                            <a href="{{route('parametros.monedas.index')}}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Vehículo</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Kardex de Vehiculos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Proveedores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inventario inicial</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>