<?php

namespace App\Http\Controllers;
use App\Models\Inicio;
use App\Models\Empresa;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Rede;
use App\Models\Slider;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Categoria;
use App\Models\Novedades;
use App\Models\FormularioContacto;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;
use App\Mail\PresupuestoMail;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Metadata;

class PageController extends Controller
{


    public function index(){
    // Obtener los datos de los modelos
    $logo = Logo::first();
    $inicio = Inicio::first();
    $redes = Rede::first();
    $servicios = Servicio::orderBy('orden', 'asc')->take(4)->get();
    $novedades = Novedades::orderBy('orden', 'asc')->get();
    $productos = Producto::orderBy('orden', 'asc')->get();
    $categorias = Categoria::orderBy('orden', 'asc')->where('destacado', 1)->get();
    $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
    $sliders = Slider::where('seccion', 'inicio')->get();
    $metadata = Metadata::where('section', 'inicio')->first();

    // Pasar los datos a la vista
    return view('page.index', compact('inicio', 'redes', 'contacto', 'sliders', 'logo', 'servicios', 'productos', 'novedades', 'metadata', 'categorias'));
    }


    public function empresa(){
    // Obtener los datos de los modelos
    $logo = Logo::first();
    $empresa = Empresa::first();
    $redes = Rede::first();
    $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
    $sliders = Slider::where('seccion', 'empresa')->get();
    $metadata = Metadata::where('section', 'empresa')->first();

    // Pasar los datos a la vista
    return view('page.empresa', compact('empresa', 'redes', 'contacto', 'logo', 'sliders', 'metadata'));
    
    }

    public function servicios(){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $inicio = Inicio::first();
        $servicios = Servicio::orderBy('orden', 'asc')->get();
        $redes = Rede::first();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $sliders = Slider::where('seccion', 'servicios')->get();
        $metadata = Metadata::where('section', 'servicios')->first();
        
        // Pasar los datos a la vista
        return view('page.servicios', compact('servicios', 'redes', 'contacto', 'logo', 'sliders', 'inicio', 'metadata'));
        
    }
    
    public function servicio($slug){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $inicio = Inicio::first();
        $servicio = Servicio::where('slug', $slug)->firstOrFail(); // Buscar el servicio por el slug
        $redes = Rede::first();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $sliders = Slider::where('seccion', 'servicios')->get();
        $metadata = Metadata::where('section', 'servicios')->first();
        
        // Pasar los datos a la vista
        return view('page.servicio', compact('servicio', 'redes', 'contacto', 'logo', 'sliders', 'inicio', 'metadata'));
        
    }
    

  
    public function search(Request $request)
    {
        // Obtenemos el término de búsqueda desde el request
        $query = $request->input('search');
        $logo = Logo::first();
        $redes = Rede::first();
        $contacto = Contacto::first();
        $metadata = Metadata::where('section', 'busqueda')->first();

        // Si hay un término de búsqueda, realizamos la consulta
        if ($query) {
            $productos = Producto::where('codigo', 'LIKE', "%$query%")
                ->orWhere('descripcion', 'LIKE', "%$query%")
                ->orWhere('nombre', 'LIKE', "%$query%")
                ->get();
        } else {
            // Si no hay búsqueda, traemos todos los productos
            $productos = Producto::all();
        }

        // Retornar los productos a la vista
        return view('page.resultado', compact('productos', 'logo', 'redes', 'contacto', 'metadata'));
    }
    
    public function categorias()
    {
        // Obtener los datos generales para la vista
        $logo = Logo::first();
        $inicio = Inicio::first();
        $redes = Rede::first();
        $contacto = Contacto::first();
        $sliders = Slider::where('seccion', 'categorias')->get();
        // Obtener todas las categorias  
        $categorias = Categoria::orderBy('orden', 'asc')->get();
        $metadata = Metadata::where('section', 'categorias')->first();
    
        // Pasar los datos a la vista
        return view('page.categorias', compact('inicio', 'redes', 'contacto', 'logo', 'categorias', 'sliders', 'metadata'));
    }
    
    public function categoriaProductos($slug)
    {
        // Obtener los datos generales
        $logo = Logo::first();
        $redes = Rede::first();
        $contacto = Contacto::first();
        
        // Buscar la categoría por slug
        $categoria = Categoria::where('slug', $slug)->firstOrFail();
        
        // Obtener los productos de esa categoría
        $productos = Producto::where('categoria_id', $categoria->id)
                    ->orderBy('orden', 'asc')
                    ->get();
        
        $sliders = Slider::where('seccion', 'categorias')->get();
        $metadata = Metadata::where('section', 'categorias')->first();
    
        // Pasar los datos a la vista
        return view('page.categoria-productos', compact(
            'productos', 
            'categoria', 
            'logo', 
            'redes', 
            'contacto', 
            'sliders', 
            'metadata'
        ));
    }

    public function productos()
    {
        // Obtener los datos generales para la vista
        $logo = Logo::first();
        $empresa = Empresa::first();
        $redes = Rede::first();
        $contacto = Contacto::first();
        $sliders = Slider::where('seccion', 'productos')->get();
        // Obtener todas las productos  
        $productos = Producto::orderBy('orden', 'asc')->get();
        $metadata = Metadata::where('section', 'productos')->first();
    
        // Pasar los datos a la vista
        return view('page.productos', compact('empresa', 'redes', 'contacto', 'logo', 'productos', 'sliders', 'metadata'));
    }
        

    public function producto($slug)
    {
        // Obtener los datos de los modelos generales
        $logo = Logo::first();
        $empresa = Empresa::first();
        $redes = Rede::first();
        $contacto = Contacto::first();
        $sliders = Slider::where('seccion', 'productos')->get();
        
        // Buscar el producto por el slug en lugar de por ID
        $producto = Producto::where('slug', $slug)->firstOrFail();
        $metadata = Metadata::where('section', 'productos')->first();
        
        // Pasar los datos a la vista
        return view('page.producto', compact('empresa', 'redes', 'contacto', 'logo', 'producto', 'sliders', 'metadata'));
    }
            

        
    public function novedades(){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $redes = Rede::first();
        $sliders = Slider::where('seccion', 'novedades')->get();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $novedades = Novedades::orderBy('orden', 'asc')->get();
        $metadata = Metadata::where('section', 'novedades')->first();
        
        // Pasar los datos a la vista
        return view('page.novedades', compact('redes', 'contacto', 'logo', 'novedades', 'sliders', 'metadata'));
    }
    
    public function novedad($id){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $redes = Rede::first();
        $sliders = Slider::where('seccion', 'novedades')->get();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $novedad = Novedades::find($id);
        $metadata = Metadata::where('section', 'novedades')->first();
        
        // Pasar los datos a la vista
        return view('page.novedad', compact('redes', 'contacto', 'logo', 'novedad', 'sliders', 'metadata'));
    }
   

    public function contacto(){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $redes = Rede::first();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $sliders = Slider::where('seccion', 'contacto')->get();
        $metadata = Metadata::where('section', 'contacto')->first();
        
        // Pasar los datos a la vista
        return view('page.contacto', compact('redes', 'contacto', 'logo', 'sliders', 'metadata'));
    }

    public function presupuesto(){
        // Obtener los datos de los modelos
        $logo = Logo::first();
        $redes = Rede::first();
        $contacto = Contacto::first(); // Si sólo hay un contacto, puedes usar first()
        $metadata = Metadata::where('section', 'presupuesto')->first();
    
        // Pasar los datos a la vista
        return view('page.presupuesto', compact('redes', 'contacto', 'logo', 'metadata'));
    }


// contacto

public function sendContactoMail(Request $request)
{
    try {
        // Validar el formulario antes de verificar reCAPTCHA
        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'nullable',
            'g-recaptcha-response' => 'required'
        ]);
        
        // Verificar reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response')
        ])->object();

        if ($response->success && $response->score >= 0.7) {
            try {
                // Guardar el formulario en la base de datos (opcional)
                $formulario = new FormularioContacto();
                $formulario->name = $request->name;
                $formulario->surname = $request->surname;
                $formulario->email = $request->email;
                $formulario->phone = $request->phone;
                $formulario->message = $request->message;
                $formulario->save();
                
                // Enviar el correo electrónico
                $contacto = Contacto::first();
                $destinatario ='gigliottilucas4@gmail.com';
                
                Mail::to($destinatario)->send(new ContactoMail($validated));

                return response()->json(['message' => 'Mensaje enviado exitosamente.']);
            } catch (\Exception $e) {
                // Registrar el error para diagnóstico
                Log::error('Error al enviar correo de contacto: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());
                
                return response()->json([
                    'error' => 'Error al enviar el mensaje: ' . $e->getMessage()
                ], 500);
            }
        } else {
            return response()->json([
                'error' => 'No se pudo enviar la solicitud. Verificación de reCAPTCHA fallida.'
            ], 422);
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Capturar específicamente errores de validación
        return response()->json([
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        // Capturar cualquier otra excepción
        Log::error('Error general en formulario de contacto: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());
        
        return response()->json([
            'error' => 'Error del servidor: ' . $e->getMessage()
        ], 500);
    }
}

    
    public function sendPresupuestoMail(Request $request)
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response')
        ])->object();
    
        if ($response->success && $response->score >= 0.7) {
            try {
                $validated = $request->validate([
                    'name' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'message' => 'required',
                    'file' => 'required|file|max:10240', // Validar el archivo (máximo 10MB)
                ]);
    
                // Guardar el archivo en el almacenamiento
                $filePath = $request->file('file')->store('presupuestos');
                // Enviar el correo con el archivo adjunto
                Mail::to('gigliottilucas4@gmail.com')->send(new PresupuestoMail($validated, $filePath));
    
                return response()->json(['message' => 'Presupuesto enviado exitosamente.']);
    
            } catch (\Exception $e) {
                // Capturar y manejar cualquier excepción que ocurra durante el proceso
                return response()->json(['error' => 'Error al enviar el mensaje.'], 500);
            }
        } else {
            return response()->json(['error' => 'No se pudo enviar la solicitud']);
        }
    }
    
    
}
