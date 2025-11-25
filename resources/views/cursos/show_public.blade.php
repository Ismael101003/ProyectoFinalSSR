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
                    
                    <div class="mt-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                        <h4 class="text-xl font-bold text-gray-900 mb-4">Deja tu opinión</h4>

                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        @auth
                            <form action="{{ route('valoraciones.store', $curso) }}" method="POST">
                                @csrf
                                
                                <div class="mb-4">
                                    <label for="puntuacion" class="block text-gray-700 font-bold mb-2">Puntuación:</label>
                                    <select name="puntuacion" id="puntuacion" class="w-full md:w-1/3 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="5">★★★★★ (5 Estrellas)</option>
                                        <option value="4">★★★★☆ (4 Estrellas)</option>
                                        <option value="3">★★★☆☆ (3 Estrellas)</option>
                                        <option value="2">★★☆☆☆ (2 Estrellas)</option>
                                        <option value="1">★☆☆☆☆ (1 Estrella)</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="comentario" class="block text-gray-700 font-bold mb-2">Tu comentario:</label>
                                    <textarea name="comentario" id="comentario" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="¿Qué te pareció este curso?"></textarea>
                                </div>

                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded shadow">
                                    Publicar Valoración
                                </button>
                            </form>
                        @endauth

                        @guest
                            <div class="text-center py-4">
                                <p class="text-gray-600 mb-2">Necesitas iniciar sesión para dejar una valoración.</p>
                                <a href="{{ route('login') }}" class="inline-block bg-white border border-gray-300 text-gray-700 font-bold py-2 px-4 rounded hover:bg-gray-50">
                                    Iniciar Sesión
                                </a>
                                <span class="mx-2 text-gray-400">o</span>
                                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
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