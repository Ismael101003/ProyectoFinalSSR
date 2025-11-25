<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('cursos.update', $curso) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label for="titulo" class="block text-gray-700">Título del Curso</label>
                            <input type="text" name="titulo" id="titulo" 
                                   value="{{ old('titulo', $curso->titulo) }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="instructor" class="block text-gray-700">Instructor</label>
                            <input type="text" name="instructor" id="instructor" 
                                   value="{{ old('instructor', $curso->instructor) }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" 
                                      class="w-full border-gray-300 rounded-md shadow-sm" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar Curso
                            </button>
                            
                            <a href="{{ route('cursos.index') }}" class="text-gray-600 hover:text-gray-900">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>