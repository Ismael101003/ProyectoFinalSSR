<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Crear Nuevo Curso') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    <form action="{{ route('cursos.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del Curso</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="instructor" class="form-label">Instructor</label>
                            <input type="text" name="instructor" id="instructor" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Guardar Curso
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>