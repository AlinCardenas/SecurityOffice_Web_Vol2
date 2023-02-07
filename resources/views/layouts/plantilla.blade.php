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
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto  mt-4 text-decoration-none">
                        <img src="{{asset('img/logo.png') }}" alt="Logo" width="185" height="68">
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/" class="nav-link align-middle px-0">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">Asistencia</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/faltas" class="nav-link align-middle px-0">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">Inasistencia</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/entradasSalidas" class="nav-link align-middle px-0">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">Registros entrada y salida</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listaUsuarios" class="nav-link px-0 align-middle">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">Usuarios</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/monitoreo" class="nav-link align-middle px-0">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">Monitoreo</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline text-white">CRUD</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li>
                                    <a href="#" class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Bonos</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0 text-white"> <span class="d-none d-sm-inline">Roles</span></a>
                                </li>
                            </ul>
                        </li>
                        {{-- AQUI --}}
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Usuario</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Nombre</a></li>
                            <li><a class="dropdown-item" href="#">Rol</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerra sesión</a></li>
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