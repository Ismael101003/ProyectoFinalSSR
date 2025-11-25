<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::latest()->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(StoreCursoRequest $request)
    {
        $datos = $request->validated();
        $datos['slug'] = Str::slug($datos['titulo']);
        Curso::create($datos);
        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito.');
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso)
    {
        $datos = $request->validated();
        $datos['slug'] = Str::slug($datos['titulo']);
        $curso->update($datos);
        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado.');
    }
}
