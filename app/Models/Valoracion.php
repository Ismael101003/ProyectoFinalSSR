<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    protected $table = 'resenas';

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function curso() {
        return $this->belongsTo(Curso::class);
    }
}
