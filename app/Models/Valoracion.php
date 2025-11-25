<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    protected $table = 'valoraciones'; 

    protected $fillable = ['user_id', 'curso_id', 'puntuacion', 'comentario'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function curso() {
        return $this->belongsTo(Curso::class);
    }
}