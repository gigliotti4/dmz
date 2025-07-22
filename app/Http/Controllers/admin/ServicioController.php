<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 

class ServicioController extends Controller
{

    public function index()
    {
        $servicios = Servicio::all();   
        return view('admin.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function show($slug)
    {
        $servicio = Servicio::where('slug', $slug)->firstOrFail();
        return view('admin.servicios.show', compact('servicio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'orden' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png',
            'galeria' => 'nullable|array',
            'galeria.*' => 'file|mimes:jpg,jpeg,png',
        ]);

        $data = $request->only('orden', 'nombre', 'descripcion');
        
        // Generar slug automáticamente
        $data['slug'] = Str::slug($request->nombre);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->storeAs('imagenes', $request->file('imagen')->getClientOriginalName(), 'public');
        }

        if ($request->hasFile('galeria')) {
            $galeria = [];
            foreach ($request->file('galeria') as $file) {
                $galeria[] = $file->storeAs('galeria', $file->getClientOriginalName(), 'public');
            }
            $data['galeria'] = $galeria;
        }

        Servicio::create($data);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio creado con éxito.');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'orden' => 'nullable|string|max:255',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|file|mimes:jpg,jpeg,png',
            'galeria' => 'nullable|array',
            'galeria.*' => 'file|mimes:jpg,jpeg,png',
        ]);

        $servicio = Servicio::findOrFail($id);
        $data = $request->only('orden', 'nombre', 'descripcion');
        
        // Actualizar slug si el nombre cambió
        if ($request->nombre !== $servicio->nombre) {
            $data['slug'] = Str::slug($request->nombre);
        }

        if ($request->hasFile('imagen')) {
            // Si hay una imagen anterior, eliminarla
            if ($servicio->imagen && Storage::disk('public')->exists($servicio->imagen)) {
                Storage::disk('public')->delete($servicio->imagen);
            }
            $data['imagen'] = $request->file('imagen')->storeAs('imagenes', $request->file('imagen')->getClientOriginalName(), 'public');
        }

        if ($request->hasFile('galeria')) {
            // Obtener la galería existente
            $galeriaExistente = $servicio->galeria ?? [];
            
            // Asegurar que sea un array
            if (is_string($galeriaExistente)) {
                $galeriaExistente = json_decode($galeriaExistente, true);
            }
            
            // Si es null, inicializar como array vacío
            if (is_null($galeriaExistente)) {
                $galeriaExistente = [];
            }
            
            // Guardar las nuevas imágenes
            foreach ($request->file('galeria') as $file) {
                $galeriaExistente[] = $file->storeAs('galeria', $file->getClientOriginalName(), 'public');
            }
            
            // Guardar la galería combinada
            $data['galeria'] = $galeriaExistente;
        }

        $servicio->update($data);

        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado con éxito.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::find($id);
        $servicio->delete();
        return redirect()->route('admin.servicios.index')->with('danger', 'servicios eliminada exitosamente.');
    }

    public function eliminarImagen($id, $key)
    {
        $servicio = Servicio::findOrFail($id);
        
        // Manejar si galeria ya viene como array o necesita decodificarse
        $galeria = $servicio->galeria;
        if (is_string($galeria)) {
            $galeria = json_decode($galeria, true);
        }
        
        // Verificar si la imagen existe
        if (isset($galeria[$key])) {
            // Almacenar el nombre del archivo para eliminarlo
            $imagePath = $galeria[$key];
            
            // Eliminar la imagen del almacenamiento
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Eliminar la imagen del array
            unset($galeria[$key]);
            
            // Reindexar array y actualizar el modelo
            $servicio->galeria = array_values($galeria);
            $servicio->save();

            return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Imagen no encontrada']);
    }
}