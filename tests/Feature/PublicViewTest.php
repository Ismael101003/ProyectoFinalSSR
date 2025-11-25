<?php

namespace Tests\Feature;

use App\Models\Curso;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_pagina_inicio_carga_correctamente(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        // Verificamos que aparezca el título de tu proyecto
        $response->assertSee('ProyectoIsma'); 
    }


    public function test_pagina_detalle_curso_muestra_titulo(): void
    {
        $curso = Curso::create([
            'titulo' => 'Curso de Prueba Laravel',
            'slug' => 'curso-de-prueba-laravel',
            'descripcion' => 'Descripción del curso de prueba',
            'instructor' => 'Isma Instructor',
        ]);

        $response = $this->get(route('cursos.show_public', $curso));

        $response->assertStatus(200);
        $response->assertSee('Curso de Prueba Laravel');
        $response->assertSee('Isma Instructor');
    }
}