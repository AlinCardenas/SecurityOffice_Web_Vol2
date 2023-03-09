<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Sitio web para la administración del acceso y monitoreo del personal">
    <meta name="author" content="Alin Amparo Cardenas Marin, Rafael Escobar Gutierrez">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 color-bg shadow-lg">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                    <div class="d-flex justify-content-center">
                        <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto  mt-4 text-decoration-none">
                            <img src="{{asset('img/logo.png') }}" alt="Logo" width="180" height="168">
                        </a>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        @if (Auth::user()->puesto->rol=='administrador' || Auth::user()->puesto->rol=='gerente')    
                        <div class="d-flex flex-row align-items-center">
                            <div class="me-3">
                                <img src="{{asset('img/asistencia.png') }}" alt="" width="30" height="30">
                            </div>
                                <li class="nav-item">
                                    <a href="/" class="nav-link align-middle px-0">
                                        <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text ">Asistencia</span>
                                    </a>
                                </li>
                            </div>
                        @endif
                        @if (Auth::user()->puesto->rol=='administrador' || Auth::user()->puesto->rol=='gerente')
                        <div class="d-flex flex-row align-items-center">
                            <div class="me-3">
                                <img src="{{asset('img/falta.png') }}" alt="" width="30" height="30">
                            </div>
                            <li class="nav-item">
                                <a href="/faltas" class="nav-link align-middle px-0">
                                    <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text">Inasistencia</span>
                                </a>
                            </li>
                        </div>
                        @endif
                        @if (Auth::user()->puesto->rol=='administrador' || Auth::user()->puesto->rol=='gerente') 
                        <div class="d-flex flex-row align-items-center">
                            <div class="me-3">
                                <img src="{{asset('img/acceso.png') }}" alt="" width="30" height="30">
                            </div>
                            <li class="nav-item">
                                <a href="/entradasSalidas" class="nav-link align-middle px-0">
                                    <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text">Registros de acceso</span>
                                </a>
                            </li>
                        </div>
                        @endif
                        @if (Auth::user()->puesto->rol=='administrador')
                        <div class="d-flex flex-row align-items-center">
                            <div class="me-3">
                                <img src="{{asset('img/usuarios.png') }}" alt="" width="30" height="30">
                            </div>
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link px-0 align-middle">
                                    <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text">Usuarios</span>
                                </a>
                            </li>
                        </div>
                        @endif
                        @if (Auth::user()->puesto->rol=='administrador')
                        <li>
                            <div class="d-flex flex-row align-items-center">
                                <div class="me-3">
                                    <img src="{{asset('img/monitoreo.png') }}" alt="" width="30" height="30">
                                </div>
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text">Monitoreo</span> 
                                </a>
                            </div>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li>
                                    <a href="{{route('voltaje')}}" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Voltaje</span></a>
                                </li>
                                <li>
                                    <a href="{{route('temperatura')}}" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline">Temperatura</span></a>
                                </li>
                            </ul>
                        </li>                             
                        @endif
                        @if (Auth::user()->puesto->rol=='administrador' || Auth::user()->puesto->rol=='gerente')
                            <li>
                                <div class="d-flex flex-row align-items-center">
                                    <div class="me-3">
                                        <img src="{{asset('img/crud.png') }}" alt="" width="30" height="30">
                                    </div>
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                        <i class=""></i> <span class="ms-1 d-none d-sm-inline text-black fs-5 text">CRUD</span> 
                                    </a>
                                </div>    
                                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li>
                                        <a href="#" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Usuarios</span></a>
                                    </li>
                                    @if (Auth::user()->puesto->rol=='administrador')
                                    <li>
                                        <a href="#" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Areas</span></a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('bonos.index')}}" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Bonos</span></a>
                                    </li>
                                    @if (Auth::user()->puesto->rol=='administrador')
                                    <li>
                                        <a href="#" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Entradas y salidas</span></a>
                                    </li>
                                    @endif
                                    @if (Auth::user()->puesto->rol=='administrador')
                                    <li>
                                        <a href="{{route('puestos.index')}}" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline">Puestos</span></a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="#" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Tipos de bonos</span></a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link px-0 text-black fs-6 text"> <span class="d-none d-sm-inline ">Turnos</span></a>
                                    </li>
                                    

                                </ul>
                            </li>
                        @endif
                        {{-- AQUI --}}
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-black text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img   class="">

                            <img class="rounded-circle" src="/imgs/{{Auth::user()->foto}}" width="30" height="30" alt="Usuario">
                            <span class="d-none d-sm-inline mx-1 text-black">Usuario</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">{{ Auth::user()->nombre }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ Auth::user()->puesto->nombre }}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{route('logOut')}}" >
                                    @csrf
                                    <button class="dropdown-item">Cerrar sesion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</html>