<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria; // Asegúrate de importar el modelo Categoria

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Agregado para el slug

class ProductoController extends Controller
{
    // Otros métodos...

    public function index()
    {
    $productos = Producto::orderBy('orden', 'asc')->get();
        // categoria_id
      $categorias = Categoria::all();

        return view('admin.productos.index', compact('productos', 'categorias'));
    }

    public function create()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('productos', 'categorias'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'orden' => 'required|string',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf' => 'nullable|file|mimes:pdf', // Validación para el archivo PDF
            'video' => 'nullable|url',
            'videodos' => 'nullable|url',
            'videotres' => 'nullable|url',
            'slug' => 'nullable|string|max:255|unique:productos,slug',
            'galeria' => 'nullable|array',
            'galeria.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'categoria_id' => 'nullable|exists:categorias,id', // Validación para categoria_id
            
        ]);

        $data = $request->all();

        // Generar el slug automáticamente
        $data['slug'] = Str::slug($data['nombre']);

        // Procesar URLs de YouTube para formato embed
        if (!empty($data['video'])) {
            $data['video'] = $this->getYoutubeEmbedUrl($data['video']);
        }
        
        if (!empty($data['videodos'])) {
            $data['videodos'] = $this->getYoutubeEmbedUrl($data['videodos']);
        }
        
        if (!empty($data['videotres'])) {
            $data['videotres'] = $this->getYoutubeEmbedUrl($data['videotres']);
        }

        // Manejo de la carga de la pdf principal
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
            $pdfPath = $pdf->storeAs('productos', $pdfName, 'public');
            $data['pdf'] = $pdfPath;
        }

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



        $producto = Producto::create($data);

     
      


        return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Obtener todas las categorías para el formulario
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'orden' => 'required|string',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'pdf' => 'nullable|file|mimes:pdf', // Validación para el archivo PDF
            'categoria_id' => 'nullable|exists:categorias,id', // Validación para
            'video' => 'nullable|',
            'videodos' => 'nullable|',
            'videotres' => 'nullable|',
            'slug' => 'nullable|string|max:255|unique:productos,slug,' . $producto->id,
            // Validación para la galería de imágenes
            'galeria' => 'nullable|array',
            'galeria.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
           
        ]);

        $data = $request->all();

        // Generar el slug automáticamente
        $data['slug'] = Str::slug($data['nombre']);

        // Procesar URLs de YouTube para formato embed
        if (!empty($data['video'])) {
            $data['video'] = $this->getYoutubeEmbedUrl($data['video']);
        }
        
        if (!empty($data['videodos'])) {
            $data['videodos'] = $this->getYoutubeEmbedUrl($data['videodos']);
        }
        
        if (!empty($data['videotres'])) {
            $data['videotres'] = $this->getYoutubeEmbedUrl($data['videotres']);
        }

        // Manejo de la carga de la pdf principal
        if ($request->hasFile('pdf')) {
            // Eliminar el PDF anterior si existe
            if ($producto->pdf) {
                Storage::disk('public')->delete($producto->pdf);
            }
            $pdf = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
            $pdfPath = $pdf->storeAs('productos', $pdfName, 'public');
            $data['pdf'] = $pdfPath;
        } else {
            // Si no se sube un nuevo PDF, mantener el anterior
            $data['pdf'] = $producto->pdf;
        }
        // Manejo de la carga de la imagen principal
        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('productos', $imageName, 'public');
            $data['imagen'] = $imagePath;
        }
        
  
        // Manejo de la carga de la galería de imágenes
        if ($request->hasFile('galeria')) {
            // Obtener la galería existente
            $galeriaExistente = $producto->galeria ?? [];
            
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
                $imageName = $file->getClientOriginalName();
                $imagePath = $file->storeAs('galeria', $imageName, 'public');
                $galeriaExistente[] = $imagePath;
            }
            
            // Guardar la galería combinada como JSON (igual que en store)
            $data['galeria'] = json_encode($galeriaExistente);
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

        // Manejar si galeria ya viene como array o necesita decodificarse
        $galeria = $producto->galeria;
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
            $producto->galeria = array_values($galeria);
            $producto->save();

            return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'Imagen no encontrada']);
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

