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
        $representacion = Representacion::find($id);
        if(!is_null($id))
            $representacion = Representacion::find($id);
        else{
            $representacion = new Representacion();

        }
        if ($request->hasFile('imagen'))
        { 
            $representacion->imagen = $request->file('imagen')->store('public/representacion');
        }

        if ($request->hasFile('pdf'))
        { 
            // nombre orginal del archivo
            $representacion->pdf = $request->file('pdf')->getClientOriginalName();
            // almacenar el archivo en el disco público
            $representacion->pdf = $request->file('pdf')->storeAs('public/representacion', $representacion->pdf);
            // guardar la ruta del archivo en el modelo
            // $representacion->pdf = str_replace('public/', '', $representacion->pdf);
          
        }
     
 
        $representacion->titulo = $request->titulo;
        $representacion->descripcion = $request->descripcion;
       
        $representacion->save();
    
        return redirect()->route('admin.representaciones.edit', ['id' => $id])->with('success', 'Registro actualizado exitosamente.');
    }
    
}
