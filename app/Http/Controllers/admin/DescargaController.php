<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Descarga;
use Illuminate\Support\Facades\Storage;


class DescargaController extends Controller
{
      /**
     * Muestra la lista de recursos (descargas).
     */
    public function index()
    {
        $descargas = Descarga::all();
        return view('admin.descargas.index', compact('descargas'));
    }

    /**
     * Muestra el formulario para crear un nuevo recurso (descarga).
     */
    public function create()
    {
        return view('admin.descargas.create');
    }

    /**
     * Almacena un nuevo recurso en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación básica (agregamos 'privado' como boolean opcional).
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'pdf'     => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'privado' => 'sometimes|boolean'
        ]);
    
        // Crear la instancia de Descarga.
        $descarga = new Descarga();
        $descarga->orden       = $request->orden;
        $descarga->nombre      = $request->nombre;
        $descarga->descripcion = $request->descripcion;
    
        // Manejo del archivo PDF si existe.
        if ($request->hasFile('pdf')) {
            $filename = $request->file('pdf')->getClientOriginalName();
            $path = $request->file('pdf')->storeAs('public/pdf', $filename);
            $descarga->pdf = $path;
        }
    
        // Asignación del campo booleano
        // Opción 1: directamente tomamos el valor y convertimos a boolean
        //           si está presente, de lo contrario false.
        $descarga->privado = $request->boolean('privado'); 
        // Con $request->boolean('privado') se convertirá en `true` o `false`
        // en base a si viene 'on' (checkbox marcado), '1' o 'true'.
    
        // Guardamos el modelo.
        $descarga->save();
    
        return redirect()->route('admin.descargas.index')
                         ->with('success', 'Descarga creada correctamente.');
    }
    

    /**
     * Muestra un recurso específico.
     */
    public function show($id)
    {
        $descarga = Descarga::findOrFail($id);
        return view('admin.descargas.show', compact('descarga'));
    }

    /**
     * Muestra el formulario para editar un recurso específico.
     */
    public function edit($id)
    {
        $descarga = Descarga::findOrFail($id);
        return view('admin.descargas.edit', compact('descarga'));
    }

    /**
     * Actualiza un recurso específico en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validación básica (agregamos 'privado' como boolean opcional).
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'pdf'     => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'privado' => 'sometimes|boolean'
        ]);
    
        $descarga = Descarga::findOrFail($id);
        $descarga->orden       = $request->orden;
        $descarga->nombre      = $request->nombre;
        $descarga->descripcion = $request->descripcion;
    
        // Si se subió un nuevo PDF, lo guardamos.
        if ($request->hasFile('pdf')) {
            $filename = $request->file('pdf')->getClientOriginalName();
            $path = $request->file('pdf')->storeAs('public/pdf', $filename);
            $descarga->pdf = $path;
        }
    
        // Asignación del campo booleano
        $descarga->privado = $request->boolean('privado'); 
    
        $descarga->save();
    
        return redirect()->route('admin.descargas.index')
                         ->with('success', 'Descarga actualizada correctamente.');
    }
    

    /**
     * Elimina un recurso específico de la base de datos.
     */
    public function destroy($id)
    {
        $descarga = Descarga::findOrFail($id);

        // Opcionalmente, podrías eliminar el archivo físico si lo deseas.
        // if ($descarga->pdf && file_exists(public_path('pdfs/' . $descarga->pdf))) {
        //     unlink(public_path('pdfs/' . $descarga->pdf));
        // }

        $descarga->delete();

        return redirect()->route('admin.descargas.index')
                         ->with('success', 'Descarga eliminada correctamente.');
    }
    
}
