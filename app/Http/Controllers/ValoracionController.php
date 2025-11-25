<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    public function store(Request $request, Curso $curso)
    {
     
        $datos = $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string|min:5',
        ]);

        
        $curso->valoraciones()->create([
            'user_id' => auth()->id(), 
            'puntuacion' => $datos['puntuacion'],
            'comentario' => $datos['comentario'],
        ]);

        return back()->with('success', '¡Gracias por tu valoración!');
    }
}
