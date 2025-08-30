<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <style>
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="navbar-logo" src="{{ asset('assets/img/Tech-solutions-Logo-23.png') }}" alt="Logo tech solutions">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proyectos') }}">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('proyectos.create') }}">Crear Proyecto</a>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-light btn-sm ms-2" href="{{ route('register') }}">Registrarse</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cuenta
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="{{ route('proyectos') }}">Mis proyectos</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <x-get-uf />
    <h1 class="text-center mt-4 text-primary-emphasis">Bienvenido a Tech Solutions</h1>
    <main class="container py-4">@yield('content')</main>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Tech Solutions. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/uf.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateNavAuth() {
                const template = document.getElementById('nav-auth-links');
                const parent = document.querySelector('.navbar-nav');
                if (!template || !parent) return;

                parent.querySelectorAll('.injected-auth').forEach(el => el.remove());

                const token = localStorage.getItem('token');
                if (token) {
                    const html = `\
                    <li class="nav-item dropdown injected-auth">\
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cuenta</a>\
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">\
                            <li><a class="dropdown-item" href="/proyectos">Mis proyectos</a></li>\
                            <li><a class="dropdown-item" href="#" id="logoutBtn">Cerrar sesión</a></li>\
                        </ul>\
                    </li>`;
                    parent.insertAdjacentHTML('beforeend', html);

                    const logout = document.getElementById('logoutBtn');
                    if (logout) {
                        logout.addEventListener('click', function(e) {
                            e.preventDefault();
                            localStorage.removeItem('token');
                            updateNavAuth();
                            window.location.href = '/';
                        });
                    }
                } else {
                    const html = `\
                    <li class="nav-item d-flex align-items-center injected-auth">\
                        <a class="nav-link" href="/api/login">Iniciar Sesión</a>\
                    </li>\
                    <li class="nav-item d-flex align-items-center injected-auth">\
                        <a class="btn btn-outline-light btn-sm ms-2" href="/api/register">Registrarse</a>\
                    </li>`;
                    parent.insertAdjacentHTML('beforeend', html);
                }
            }

            window.updateNavAuth = updateNavAuth;
            updateNavAuth();
        });
    </script>

</body>

</html>
