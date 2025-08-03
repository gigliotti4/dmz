<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Representacion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RepresentacionController extends Controller
{


   /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $representacion = Representacion::find($id);

        if (!$representacion) {
            return redirect()->route('admin.representaciones.edit', ['id' => $id])->with('error', 'Registro no encontrado.');
        }

        return view('admin.representaciones.editar', compact('representacion'));
    }

    public function update(Request $request, $id)
    {
        // Encontrar o crear el registro
        if(!is_null($id) && $id > 0) {
            $representacion = Representacion::find($id);
            if (!$representacion) {
                return redirect()->route('admin.representaciones.edit', ['id' => $id])->with('error', 'Registro no encontrado.');
            }
        } else {
            $representacion = new Representacion();
        }
        
        // Procesar imagen
        if ($request->hasFile('imagen')) { 
            $representacion->imagen = $request->file('imagen')->store('public/representacion');
        }

        // Procesar PDF
        if ($request->hasFile('pdf')) { 
            // nombre orginal del archivo
            $nombreArchivo = $request->file('pdf')->getClientOriginalName();
            // almacenar el archivo en el disco público
            $representacion->pdf = $request->file('pdf')->storeAs('public/representacion', $nombreArchivo);
        }
        
        // Asignar campos básicos
        $representacion->titulo = $request->input('titulo');
        $representacion->descripcion = $request->input('descripcion');
        
        // Procesar URLs de YouTube para formato embed
        if ($request->filled('video')) {
            $representacion->video = $this->getYoutubeEmbedUrl($request->input('video'));
        }
        
        if ($request->filled('videodos')) {
            $representacion->videodos = $this->getYoutubeEmbedUrl($request->input('videodos'));
        }
        
        if ($request->filled('videotres')) {
            $representacion->videotres = $this->getYoutubeEmbedUrl($request->input('videotres'));
        }

        // Guardar el modelo
        $representacion->save();

        return redirect()->route('admin.representaciones.edit', ['id' => $representacion->id])->with('success', 'Registro actualizado exitosamente.');
    }
    
    /**
     * Convierte una URL de YouTube en formato embed
     * 
     * @param string $url
     * @return string
     */
    private function getYoutubeEmbedUrl($url)
    {
        $pattern = '/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
        preg_match($pattern, $url, $matches);
        
        if (!empty($matches[1])) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }
        
        // Si no coincide con el formato conocido, devolvemos la URL original
        return $url;
    }
}
