<?php
use App\Http\Controllers\admin\FormularioContactoController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');
Route::get('/empresa', [App\Http\Controllers\PageController::class, 'empresa'])->name('empresa');
Route::get('/contacto', [App\Http\Controllers\PageController::class, 'contacto'])->name('contacto');
Route::get('/servicios', [App\Http\Controllers\PageController::class, 'servicios'])->name('servicios');
Route::get('/procesos', [App\Http\Controllers\PageController::class, 'procesos'])->name('procesos');
Route::get('/productos', [App\Http\Controllers\PageController::class, 'productos'])->name('productos');
Route::get('/producto/{slug}', [App\Http\Controllers\PageController::class, 'producto'])->name('producto');
Route::get('/novedades', [App\Http\Controllers\PageController::class, 'novedades'])->name('novedades');
Route::get('/novedad/{id}', [App\Http\Controllers\PageController::class, 'novedad'])->name('novedad');
Route::get('/filtroproducto', [App\Http\Controllers\PageController::class, 'filtroProducto'])->name('filtroproducto');
Route::get('/buscar-productos', [App\Http\Controllers\PageController::class, 'search'])->name('productos.search');
Route::post('/contacto/send', [App\Http\Controllers\PageController::class, 'sendContactoMail'])->name('contacto.send');
Route::post('/presupuesto/send', [App\Http\Controllers\PageController::class, 'sendPresupuestoMail'])->name('presupuesto.send');
Route::post('/newsletter', [App\Http\Controllers\PageController::class, 'newsletter'])->name('newsletter.send');

// sitemap
Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.index');

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard route
        Route::get('/dashboard', [App\Http\Controllers\admin\AdmController::class, 'dashboard'])->name('dashboard');
    
        // Slider routes
        Route::prefix('slider')->name('slider.')->group(function () {
            Route::get('{seccion}', [App\Http\Controllers\admin\SliderController::class, 'index'])->name('index');
            Route::get('{seccion}/create', [App\Http\Controllers\admin\SliderController::class, 'create'])->name('create');
            Route::post('{seccion}/store', [App\Http\Controllers\admin\SliderController::class, 'store'])->name('store');
            Route::get('{seccion}/edit/{id}', [App\Http\Controllers\admin\SliderController::class, 'edit'])->name('edit');
            Route::put('{seccion}/update/{id}', [App\Http\Controllers\admin\SliderController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\SliderController::class, 'destroy'])->name('destroy');
        });
    
        // Logos routes
        Route::prefix('logos')->name('logos.')->group(function () {
            Route::get('/edit/{id}', [App\Http\Controllers\admin\LogoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\LogoController::class, 'update'])->name('update');
        });
    
        // Inicio routes
        Route::prefix('inicio')->name('inicio.')->group(function () {
            Route::get('/edit/{id}', [App\Http\Controllers\admin\InicioController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\InicioController::class, 'update'])->name('update');
        });

        // Empresa routes
        Route::prefix('empresa')->name('empresa.')->group(function () {
            Route::get('/edit/{id}', [App\Http\Controllers\admin\EmpresaController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\EmpresaController::class, 'update'])->name('update');
            Route::delete('/eliminar-imagen/{id}/{imagen}', [App\Http\Controllers\admin\EmpresaController::class, 'eliminarImagen'])->name('eliminarImagen');
        });
      
        // Contacto routes
        Route::prefix('contacto')->name('contacto.')->group(function () {
            Route::get('/edit/{id}', [App\Http\Controllers\admin\ContactoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\ContactoController::class, 'update'])->name('update');
        });
    
        // Redes routes
        Route::prefix('redes')->name('redes.')->group(function () {
            Route::get('/edit/{id}', [App\Http\Controllers\admin\RedeController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\RedeController::class, 'update'])->name('update');
        });

        // Productos routes
        Route::prefix('productos')->name('productos.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ProductoController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\ProductoController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\ProductoController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\ProductoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\ProductoController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\ProductoController::class, 'destroy'])->name('destroy');
            Route::delete('eliminar-imagen/{id}/{key}', [App\Http\Controllers\admin\ProductoController::class, 'eliminarImagen'])->name('eliminarImagen');
        });

        // Proceso routes
        Route::prefix('procesos')->name('procesos.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ProcesoController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\ProcesoController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\ProcesoController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\ProcesoController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\ProcesoController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\ProcesoController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('novedades')->name('novedades.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\NovedadesController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\NovedadesController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\NovedadesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\NovedadesController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\NovedadesController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\NovedadesController::class, 'destroy'])->name('destroy');
            Route::delete('eliminar-imagen/{id}/{key}', [App\Http\Controllers\admin\NovedadesController::class, 'eliminarImagen'])->name('admin.novedades.eliminarImagen');
        });

        //  ingenieria routes
        Route::prefix('servicios')->name('servicios.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\ServicioController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\ServicioController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\ServicioController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\ServicioController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\ServicioController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\ServicioController::class, 'destroy'])->name('destroy');
            Route::delete('/eliminar-imagen/{id}/{key}', [App\Http\Controllers\admin\ServicioController::class, 'eliminarImagen'])->name('eliminar_imagen');
        });

        // Users routes
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\UserController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\UserController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\UserController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\UserController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\UserController::class, 'destroy'])->name('destroy');
        });
    
        Route::prefix('metadatos')->name('metadatos.')->group(function () {
            Route::get('/', [App\Http\Controllers\admin\MetadataController::class, 'index'])->name('index');
            Route::get('/create', [App\Http\Controllers\admin\MetadataController::class, 'create'])->name('create');
            Route::post('/store', [App\Http\Controllers\admin\MetadataController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [App\Http\Controllers\admin\MetadataController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [App\Http\Controllers\admin\MetadataController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [App\Http\Controllers\admin\MetadataController::class, 'destroy'])->name('destroy');
        });

        // Contacto Mensajes
        Route::resource('contactomensaje', FormularioContactoController::class);
    });
});

// Include authentication routes
require __DIR__.'/auth.php';
