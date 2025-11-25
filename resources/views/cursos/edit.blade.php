<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 text-dark">
            {{ __('Editar Curso') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    
                    <form action="{{ route('cursos.update', $curso) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del Curso</label>
                            <input type="text" name="titulo" id="titulo" 
                                   value="{{ old('titulo', $curso->titulo) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="instructor" class="form-label">Instructor</label>
                            <input type="text" name="instructor" id="instructor" 
                                   value="{{ old('instructor', $curso->instructor) }}"
                                   class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea name="descripcion" id="descripcion" rows="4" 
                                      class="form-control" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <button type="submit" class="btn btn-primary">
                                Actualizar Curso
                            </button>
                            
                            <a href="{{ route('cursos.index') }}" class="text-secondary text-decoration-none">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>