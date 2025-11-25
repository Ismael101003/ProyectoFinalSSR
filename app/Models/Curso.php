<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    public function valoraciones()
    {
        return $this->hasMany(Valoracion::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
