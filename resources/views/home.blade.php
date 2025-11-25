<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ProyectoIsma - Cursos</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        
        <nav class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="text-xl font-bold text-indigo-600">
                            ProyectoIsma
                        </a>
                    </div>
                    <div class="flex items-center">
                        @auth
                            <a href="{{ route('cursos.index') }}" class="text-sm text-gray-700 underline">Ir al Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline mr-4">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-900">Catálogo de Cursos</h1>
                    <p class="mt-2 text-gray-600">Aprende con los mejores instructores</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($cursos as $curso)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition duration-300">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2 text-gray-800">
                                    {{ $curso->titulo }}
                                </h2>
                                <p class="text-sm text-indigo-500 mb-4 font-bold">
                                    Instr. {{ $curso->instructor }}
                                </p>
                                <p class="text-gray-600 mb-4 h-20 overflow-hidden">
                                    {{ Str::limit($curso->descripcion, 100) }}
                                </p>
                                <a href="{{ route('cursos.show_public', $curso) }}" class="block w-full text-center bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    Ver Detalles
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $cursos->links() }}
                </div>
            </div>
        </div>
    </body>
</html>