@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-6">
    <h1 class="text-2xl font-semibold mb-4">Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="titulo" class="block text-sm font-medium">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $curso->titulo) }}" class="mt-1 w-full border rounded px-3 py-2" required>
            @error('titulo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="descripcion" class="block text-sm font-medium">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 w-full border rounded px-3 py-2" required>{{ old('descripcion', $curso->descripcion) }}</textarea>
            @error('descripcion')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="instructor" class="block text-sm font-medium">Instructor</label>
            <input type="text" name="instructor" id="instructor" value="{{ old('instructor', $curso->instructor) }}" class="mt-1 w-full border rounded px-3 py-2" required>
            @error('instructor')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex justify-end space-x-2">
            <a href="{{ route('cursos.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Actualizar</button>
        </div>
    </form>
</div>
@endsection