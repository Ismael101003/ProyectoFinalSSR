<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // ¡ESTA ES LA LÍNEA QUE FALTA!
    protected $fillable = ['titulo', 'slug', 'descripcion', 'instructor'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function resenas() // o valoraciones, como lo hayamos nombrado finalmente
    {
        return $this->hasMany(Valoracion::class);
    }
    
    // Si usaste valoraciones:
    public function valoraciones() {
        return $this->hasMany(Valoracion::class);
    }
}
