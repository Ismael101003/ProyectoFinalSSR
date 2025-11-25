<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CursoManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prueba 3: Verificar que un invitado no puede ver la página de crear cursos.
     * Requisito del PDF: test_guest_cannot_access_create_course_page
     */
    public function test_invitado_no_puede_ver_creacion_cursos(): void
    {
        // Intentamos entrar a la ruta protegida sin loguearnos
        $response = $this->get(route('cursos.create'));

        // Debe redirigirnos (Status 302) al login
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Prueba 4: Verificar que un usuario autenticado puede crear un curso.
     * Requisito del PDF: test_authenticated_user_can_create_a_course
     */
    public function test_usuario_autenticado_puede_crear_curso(): void
    {
        // 1. Crear un usuario ficticio y loguearlo
        $user = User::factory()->create();
        
        // 2. Actuar como ese usuario y enviar datos POST para crear el curso
        $response = $this->actingAs($user)->post(route('cursos.store'), [
            'titulo' => 'Nuevo Curso PHP',
            'descripcion' => 'Contenido del curso avanzado',
            'instructor' => 'Profesor X',
            // El slug se genera automático en el controller, no lo enviamos
        ]);

        // 3. Verificar que nos redirige al index después de guardar
        $response->assertRedirect(route('cursos.index'));
        $response->assertSessionHas('success');

        // 4. Verificar que el curso realmente existe en la Base de Datos
        $this->assertDatabaseHas('cursos', [
            'titulo' => 'Nuevo Curso PHP',
            'instructor' => 'Profesor X',
            'slug' => 'nuevo-curso-php' // Verificamos que el slug se generó bien
        ]);
    }
}