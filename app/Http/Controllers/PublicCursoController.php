<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class PublicCursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::latest()->paginate(9); 
        
        return view('home', compact('cursos'));
    }

    public function show(Curso $curso)
    {

        $curso->load('valoraciones.user');

        return view('cursos.show_public', compact('curso'));
    }
}
