
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    @hasSection('title')
        @yield('title') - Tienda Oficial River Plate
    @else
        Tienda Oficial River Plate
    @endif
    </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/otros/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{asset ('css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
<!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                <span class="navbar-brand p-3 fw-bold" id="logo">Tienda Oficial River Plate</span>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navMenu" aria-label="Menu tienda River Plate">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="{{ route('articulos.index') }}">Productos</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="{{ url('/contacto') }}">Contacto</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="{{ url('/alumnos') }}">Alumnos</a>
                        </li>
                        <li class="nav-item px-2 py-2">
                            <a class="nav-link text-uppercase text-dark" href="#seccion-libre">Partidos</a>
                        </li>
                        @if(auth()->check())
                            @if(auth()->user()->role === 'admin')
                                <li class="nav-item px-2 py-2">
                                    <a class="nav-link text-uppercase text-dark" href="{{ route('admin.index') }}">Administración</a>
                                </li>
                            @elseif(auth()->user()->role === 'user')
                                <li class="nav-item px-2 py-2">
                                    <a class="nav-link text-uppercase text-dark" href="{{ url('/carrito') }}">Carrito</a>
                                </li>
                            @endif
                        @endif

                        @if (auth()->check())

                            <!-- Nombre del usuario -->
                            <li class="nav-item px-2 py-2 d-flex align-items-center text-uppercase text-dark fw-semibold">
                                {{ auth()->user()->name }}
                            </li>
                            <!-- Botón cerrar sesión -->
                            <li class="nav-item px-2 py-2 d-flex align-items-center">
                                <form method="POST" action="{{ route('auth.logout') }}" class="m-0">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center gap-2" style="height: 40px;">
                                        <i class="bi bi-box-arrow-right"></i> Salir
                                    </button>
                                </form>
                            </li>

                        @else
                            <li class="nav-item px-2 py-2">
                                <a class="nav-link text-uppercase text-dark" href="{{ url('/login') }}">Login</a>
                            </li>
                         @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        
    @if(session()->has('feedback.message'))
        <div class="container mt-3">
            <div class="alert alert-{{ session('feedback.type', 'success') }} alert-dismissible fade show" role="alert">
                {!! session('feedback.message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        </div>
    @endif
    
    <main class="flex-fill">
    <section class="container">
        <h1 class="text-center d-none">
            @hasSection('title')
                @yield('title') - Tienda Oficial River Plate
            @else
                Tienda Oficial River Plate
            @endif
        </h1>
    </section>

    <section>
        @yield('carrousel')
    </section>

    <section class="container">
        @yield('content')
    </section>
</main>
    <!-- FOOTER -->
   <footer class="text-white text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p><span class="id">&copy;</span> 2025 Club Atlético River <span class="id">Plate</span></p>
                </div>
                <div class="col-md-6">
                    <!-- REDES -->
                    <a href="https://www.facebook.com/riverplateoficial/?locale=es_LA" class="btn btn-outline-light mx-2"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/RiverPlate?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="btn btn-outline-light mx-2"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/riverplate/" class="btn btn-outline-light mx-2"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-container">
            <nav>
                <ul class="footer-menu">
                    <li><a href="{{ url('/') }}">INICIO</a></li>
                    <li><a href="{{ url('/articulos') }}">PRODUCTOS</a></li>
                    <li><a href="{{ url('/contacto') }}">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>