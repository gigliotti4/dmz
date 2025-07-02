<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{

    public function edit($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('admin.empresa.edit', ['id' => $id])->with('error', 'Registro no encontrado.');
        }

        return view('admin.empresa.editar', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if(!is_null($id))
            $empresa = Empresa::find($id);
        else{
            $empresa          = new Empresa();
        }

        $empresa->titulo = $request->titulo;
        $empresa->descripcion_izq = $request->descripcion_izq;
        $empresa->descripcion_der = $request->descripcion_der;

        // galeria
        if ($request->hasFile('galeria')) {
            $galeria = $empresa->galeria ? json_decode($empresa->galeria, true) : [];
            foreach ($request->file('galeria') as $image) {
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('empresa', $imageName, 'public');
                $galeria[] = $imagePath;
            }
            $empresa->galeria = json_encode($galeria);
        }

        $empresa->save();

        return redirect()->route('admin.empresa.edit', ['id' => $id])->with('success', 'Registro actualizado exitosamente.');
    }



    // Elimina una imagen específica de la galería de la empresa
    public function eliminarImagen($id, $key)
    {
        $empresa = Empresa::findOrFail($id);
        $galeria = json_decode($empresa->galeria, true);

        if (isset($galeria[$key])) {
            // Eliminar la imagen del almacenamiento
            Storage::disk('public')->delete($galeria[$key]);

            // Eliminar la imagen del array
            unset($galeria[$key]);
            
            // Actualizar la galería en la base de datos (reindexar array)
            $empresa->galeria = json_encode(array_values($galeria));
            $empresa->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Imagen no encontrada']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
