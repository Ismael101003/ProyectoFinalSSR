<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $curso->titulo }} - ProyectoIsma</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white border-b border-gray-100 p-4">
        <div class="max-w-7xl mx-auto">
            <a href="{{ route('home') }}" class="text-indigo-600 font-bold hover:underline">
                &larr; Volver al Catálogo
            </a>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-8">
                    <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $curso->titulo }}</h1>
                    <p class="text-lg text-indigo-600 font-semibold mb-6">Instructor: {{ $curso->instructor }}</p>
                    
                    <div class="prose max-w-none text-gray-700">
                        <p>{{ $curso->descripcion }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Opiniones de los estudiantes</h3>

                    @if($curso->valoraciones->count() > 0)
                        <div class="space-y-6">
                            @foreach($curso->valoraciones as $valoracion)
                                <div class="border-b border-gray-200 pb-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-bold text-gray-800">{{ $valoracion->user->name }}</span>
                                        <span class="text-sm text-gray-500">{{ $valoracion->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex items-center mb-2">
                                        <span class="text-yellow-500 font-bold text-lg">
                                            {{ str_repeat('★', $valoracion->puntuacion) }}
                                            <span class="text-gray-300">{{ str_repeat('★', 5 - $valoracion->puntuacion) }}</span>
                                        </span>
                                    </div>
                                    <p class="text-gray-600">{{ $valoracion->comentario }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500 italic">Este curso aún no tiene valoraciones. ¡Sé el primero en opinar!</p>
                    @endif
                    
                    <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200 text-center">
                        <p class="text-gray-600">¿Quieres dejar tu opinión?</p>
                        @auth
                            <p class="text-sm font-bold text-indigo-600 mt-2">Formulario de reseñas (Próximamente)</p>
                        @else
                            <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:underline">Inicia sesión</a> para dejar una reseña.
                        @endauth
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>
</html>