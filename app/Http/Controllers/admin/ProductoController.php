<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Agregado para el slug

class ProductoController extends Controller
{
    // Otros métodos...

    public function index()
    {
$productos = Producto::orderBy('orden', 'asc')->get();

        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {

        $productos = Producto::all();
        return view('admin.productos.create', compact('productos'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'orden' => 'required|string',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'galeria' => 'nullable|array',
            'galeria.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        $data = $request->all();

        // Generar el slug automáticamente
        $data['slug'] = Str::slug($data['nombre']);

        // Manejo de la carga de la imagen principal
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('galeria', $imageName, 'public');
            $data['imagen'] = $imagePath;
        }

        // Manejo de la carga de la galería de imágenes
        if ($request->hasFile('galeria')) {
            $galeria = [];
            foreach ($request->file('galeria') as $image) {
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('productos', $imageName, 'public');
                $galeria[] = $imagePath;
            }
            $data['galeria'] = json_encode($galeria);
        }

        $producto = Producto::create($data);

     
      


        return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'orden' => 'required|string',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            
            'galeria' => 'nullable|array',
            'galeria.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
           
        ]);

        $data = $request->all();

        // Generar el slug automáticamente
        $data['slug'] = Str::slug($data['nombre']);

        // Manejo de la carga de la imagen principal
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('productos', $imageName, 'public');
            $data['imagen'] = $imagePath;
        }
        
  
        // Manejo de la carga de la galería de imágenes
        if ($request->hasFile('galeria')) {
            $galeria = [];
            foreach ($request->file('galeria') as $image) {
                $imageName = $image->getClientOriginalName();
                $imagePath = $image->storeAs('galeria', $imageName, 'public');
                $galeria[] = $imagePath;
            }
            $data['galeria'] = json_encode($galeria);
        }

        $producto->update($data);

 


        return redirect()->route('admin.productos.index')->with('success', 'Producto "' . $producto->nombre . '" actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('danger', 'Producto eliminada exitosamente.');
    }

    public function eliminarImagen($id, $key)
    {
        $producto = Producto::findOrFail($id);
        $galeria = json_decode($producto->galeria, true);

        if (isset($galeria[$key])) {
            // Eliminar la imagen del almacenamiento
            Storage::disk('public')->delete($galeria[$key]);

            // Eliminar la imagen del array y guardar el producto actualizado
            unset($galeria[$key]);
            $producto->galeria = json_encode(array_values($galeria)); // Reindexar array
            $producto->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Imagen no encontrada']);
    }
    

   




}

