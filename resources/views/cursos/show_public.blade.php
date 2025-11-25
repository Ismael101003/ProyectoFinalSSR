<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $curso->titulo }} - ProyectoIsma</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light font-sans antialiased">

    <nav class="navbar navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand text-primary fw-bold">
                &larr; Volver al Catálogo
            </a>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            
            <div class="card shadow-sm mb-4">
                <div class="card-body p-5">
                    <h1 class="display-5 fw-bold text-dark mb-2">{{ $curso->titulo }}</h1>
                    <p class="lead text-primary fw-semibold mb-4">Instructor: {{ $curso->instructor }}</p>
                    
                    <div class="text-secondary">
                        <p>{{ $curso->descripcion }}</p>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-5">
                    <h3 class="h4 fw-bold text-dark mb-4">Opiniones de los estudiantes</h3>

                    @if($curso->valoraciones->count() > 0)
                        <div class="vstack gap-4">
                            @foreach($curso->valoraciones as $valoracion)
                                <div class="border-bottom pb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="fw-bold text-dark">{{ $valoracion->user->name }}</span>
                                        <span class="small text-muted">{{ $valoracion->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-warning fw-bold fs-5">
                                            {{ str_repeat('★', $valoracion->puntuacion) }}
                                            <span class="text-muted opacity-25">{{ str_repeat('★', 5 - $valoracion->puntuacion) }}</span>
                                        </span>
                                    </div>
                                    <p class="text-secondary mb-0">{{ $valoracion->comentario }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted fst-italic">Este curso aún no tiene valoraciones. ¡Sé el primero en opinar!</p>
                    @endif
                    
                    <div class="mt-5 p-4 bg-light rounded border">
                        <h4 class="h5 fw-bold text-dark mb-3">Deja tu opinión</h4>

                        @if(session('success'))
                            <div class="alert alert-success mb-3">
                                {{ session('success') }}
                            </div>
                        @endif

                        @auth
                            <form action="{{ route('valoraciones.store', $curso) }}" method="POST">
                                @csrf
                                
                                <div class="mb-3">
                                    <label for="puntuacion" class="form-label fw-bold text-secondary">Puntuación:</label>
                                    <select name="puntuacion" id="puntuacion" class="form-select w-auto">
                                        <option value="5">★★★★★ (5 Estrellas)</option>
                                        <option value="4">★★★★☆ (4 Estrellas)</option>
                                        <option value="3">★★★☆☆ (3 Estrellas)</option>
                                        <option value="2">★★☆☆☆ (2 Estrellas)</option>
                                        <option value="1">★☆☆☆☆ (1 Estrella)</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="comentario" class="form-label fw-bold text-secondary">Tu comentario:</label>
                                    <textarea name="comentario" id="comentario" rows="3" class="form-control" placeholder="¿Qué te pareció este curso?"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">
                                    Publicar Valoración
                                </button>
                            </form>
                        @endauth

                        @guest
                            <div class="text-center py-3">
                                <p class="text-secondary mb-2">Necesitas iniciar sesión para dejar una valoración.</p>
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary fw-bold me-2">
                                    Iniciar Sesión
                                </a>
                                <span class="mx-2 text-muted">o</span>
                                <a href="{{ route('register') }}" class="text-primary text-decoration-none hover-underline">
                                    Regístrate gratis
                                </a>
                            </div>
                        @endguest
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>
</html>