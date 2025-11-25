<?php

namespace Tests\Feature;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PruebaVistasPublicasTest extends TestCase
{
    use RefreshDatabase; 
    /** @test */
    public function la_pagina_de_inicio_carga_correctamente()
    {
        $response = $this->get('/');

        // 2. Verificación: Esperamos un código 200 (OK)
        $response->assertStatus(200);
    }

    /** @test */
    public function la_pagina_de_inicio_muestra_los_cursos()
    {
        // 1. Preparación: Creamos un curso en la BD
        $curso = Curso::factory()->create([
            'titulo' => 'Curso de Laravel Avanzado',
            'instructor' => 'Isma Dev'
        ]);

        // 2. Acción: Visitamos el inicio
        $response = $this->get('/');

        // 3. Verificación: Vemos el título del curso en el HTML
        $response->assertSee('Curso de Laravel Avanzado');
        $response->assertSee('Isma Dev');
    }

    /** @test */
    public function la_pagina_de_detalle_carga_correctamente()
    {
        $curso = Curso::factory()->create();

        $response = $this->get(route('cursos.show_public', $curso));

        $response->assertStatus(200);
        $response->assertSee($curso->titulo);
    }
}