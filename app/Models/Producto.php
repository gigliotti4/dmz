<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['orden','nombre', 'descripcion', 'imagen', 'galeria', 'categoria_id', 'slug', 'video', 'videodos', 'videotres', 'pdf'];

     protected $casts = [
        'galeria' => 'array',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('orden', function (Builder $builder) {
            $builder->orderBy('orden');
        });
    }

}
