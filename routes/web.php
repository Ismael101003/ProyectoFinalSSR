<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PublicCursoController;
use App\Http\Controllers\ValoracionController;
use Illuminate\Support\Facades\Route;

// Página de Inicio (Lista de Cursos)
Route::get('/', [PublicCursoController::class, 'index'])->name('home');

Route::get('/curso/{curso}', [PublicCursoController::class, 'show'])->name('cursos.show_public');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cursos', CursoController::class);

    Route::post('/curso/{curso}/valoraciones', [ValoracionController::class, 'store'])
        ->name('valoraciones.store');
});

require __DIR__.'/auth.php';
