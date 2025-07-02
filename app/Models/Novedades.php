<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedades extends Model
{
    use HasFactory;

    protected $fillable = ['orden', 'titulo', 'descripcion', 'imagen', 'descripcion_corto', 'galeria'];

    protected $casts = [
        'galeria' => 'array',
    ];

   
}
