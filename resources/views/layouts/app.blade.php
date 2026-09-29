<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Inicio') | Biblioteca Virtual</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header class="barra-superior">
        <div class="contenedor barra-superior__contenido">
            <a href="{{ route('home') }}" class="marca">
                <img
                    src="{{ asset('images/escudo.jpg') }}"
                    alt="Escudo del instituto"
                    class="marca__logo"
                >
                <span class="marca__texto">
                    <strong>Biblioteca Virtual</strong>
                    <small>Gestión de libros y autores</small>
                </span>
            </a>

            <nav class="menu">
                <a href="{{ route('home') }}" class="menu__enlace {{ request()->routeIs('home') ? 'activo' : '' }}">
                    Inicio
                </a>
                <a href="{{ route('autores.index') }}" class="menu__enlace {{ request()->routeIs('autores.*') ? 'activo' : '' }}">
                    Autores
                </a>
                <a href="{{ route('editores.index') }}" class="menu__enlace {{ request()->routeIs('editores.*') ? 'activo' : '' }}">
                    Editores
                </a>
                <a href="{{ route('traductores.index') }}" class="menu__enlace {{ request()->routeIs('traductores.*') ? 'activo' : '' }}">
                    Traductores
                </a>
                <a href="{{ route('libros.index') }}" class="menu__enlace {{ request()->routeIs('libros.*') ? 'activo' : '' }}">
                    Libros
                </a>
            </nav>
        </div>
    </header>

    <main class="contenedor principal">
        @include('partials.alertas')

        @yield('contenido')
    </main>

    <footer class="pie">
        <div class="contenedor">
            <p>Biblioteca Virtual &mdash; Sistema de gestión de autores, editores, traductores y libros.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
