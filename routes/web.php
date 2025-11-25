<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PublicCursoController;
use Illuminate\Support\Facades\Route;

// Página de Inicio (Lista de Cursos)
Route::get('/', [PublicCursoController::class, 'index'])->name('home');

// Vista de detalle del curso (Pública)
Route::get('/curso/{curso}', [PublicCursoController::class, 'show'])->name('cursos.show_public');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('cursos', CursoController::class);
});

require __DIR__.'/auth.php';
