<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('cursos.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="titulo" class="block text-gray-700">Título del Curso</label>
                            <input type="text" name="titulo" id="titulo" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="instructor" class="block text-gray-700">Instructor</label>
                            <input type="text" name="instructor" id="instructor" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="descripcion" class="block text-gray-700">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Guardar Curso
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>