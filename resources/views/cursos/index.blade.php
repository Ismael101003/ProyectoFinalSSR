@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Cursos</h1>
        <a href="{{ route('cursos.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded">Nuevo Curso</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Instructor</th>
                    <th class="px-4 py-2 text-left">Creado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @forelse($cursos as $curso)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $curso->titulo }}</td>
                    <td class="px-4 py-2">{{ $curso->instructor }}</td>
                    <td class="px-4 py-2">{{ $curso->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('cursos.edit', $curso) }}" class="text-blue-600 hover:underline">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar curso?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">No hay cursos registrados.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $cursos->links() }}
    </div>
</div>
@endsection