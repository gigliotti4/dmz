<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representacion extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'pdf',
        'video',
        'videodos',
        'videotres',
    ];
}
