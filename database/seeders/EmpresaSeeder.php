<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un único registro para la tabla 'empresas'
        Empresa::create([
            'titulo' => 'Título de la empresa',
            'descripcion_izq' => 'Descripción de la empresa',
            'descripcion_der' => 'Descripción de la empresa der',
          //  'imagen' => 'public/empresa/ejemplo.jpg', // Ruta de la imagen de ejemplo
            'galeria' => '[]', // Ruta de la galería de ejemplo
            
        ]);
    }
}
