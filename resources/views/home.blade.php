<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ProyectoIsma - Cursos</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-light font-sans antialiased">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="{{ route('home') }}">
                    ProyectoIsma
                </a>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ route('cursos.index') }}" class="btn btn-link text-secondary text-decoration-none">Ir al Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link text-secondary text-decoration-none me-2">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-link text-secondary text-decoration-none">Registrarse</a>
                    @endauth
                </div>
            </div>
        </nav>

        <div class="py-5">
            <div class="container">
                
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bold text-dark">Catálogo de Cursos</h1>
                    <p class="lead text-secondary">Aprende con los mejores instructores</p>
                </div>

                <div class="row g-4">
                    @foreach ($cursos as $curso)
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm hover-shadow transition">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-dark mb-2">
                                        {{ $curso->titulo }}
                                    </h5>
                                    <p class="card-subtitle mb-3 text-primary fw-bold small">
                                        Instr. {{ $curso->instructor }}
                                    </p>
                                    <p class="card-text text-secondary mb-4" style="height: 4.5rem; overflow: hidden;">
                                        {{ Str::limit($curso->descripcion, 100) }}
                                    </p>
                                    <a href="{{ route('cursos.show_public', $curso) }}" class="btn btn-dark w-100">
                                        Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $cursos->links() }}
                </div>
            </div>
        </div>
    </body>
</html>