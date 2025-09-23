<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Novedades;
use App\Models\Servicio;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        // Cachear el sitemap por 24 horas
        return Cache::remember('sitemap', 60*24, function() {
            $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
            $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
            $sitemap .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
            
            // URLs estáticas con prioridades diferenciadas
            $staticUrls = [
                ['url' => route('index'), 'priority' => '1.0', 'changefreq' => 'daily'],         // Página principal
                ['url' => route('empresa'), 'priority' => '0.8', 'changefreq' => 'monthly'],      // Sobre nosotros
                ['url' => route('contacto'), 'priority' => '0.8', 'changefreq' => 'monthly'],     // Contacto
                ['url' => route('productos'), 'priority' => '0.9', 'changefreq' => 'weekly'],     // Lista de productos
                ['url' => route('categorias'), 'priority' => '0.8', 'changefreq' => 'weekly'],    // Lista de categorías
                ['url' => route('servicios'), 'priority' => '0.8', 'changefreq' => 'weekly'],     // Servicios
                ['url' => route('representaciones'), 'priority' => '0.7', 'changefreq' => 'monthly'], // Representaciones
                ['url' => route('novedades'), 'priority' => '0.9', 'changefreq' => 'daily'],      // Novedades
            ];
    
            // Agregar URLs estáticas
            foreach ($staticUrls as $item) {
                $sitemap .= $this->createSitemapItem(
                    $item['url'], 
                    $item['priority'], 
                    $item['changefreq']
                );
            }
            
            // Agregar productos desde la base de datos
            try {
                $productos = Producto::all(); // O usar paginate si hay muchos
                foreach ($productos as $producto) {
                    $lastMod = $producto->updated_at ? $producto->updated_at->format('Y-m-d') : date('Y-m-d');
                    $url = route('producto', ['slug' => $producto->slug]);
                    
                    if (isset($producto->imagen)) {
                        $sitemap .= $this->createSitemapItemWithImage(
                            $url,
                            '0.8',
                            'weekly',
                            $lastMod,
                            asset('storage/productos/' . $producto->imagen),
                            $producto->nombre
                        );
                    } else {
                        $sitemap .= $this->createSitemapItem($url, '0.8', 'weekly', $lastMod);
                    }
                }
            } catch (\Exception $e) {
                // Si hay algún error, continuar con las demás secciones
            }
            
            // Agregar categorías
            try {
                $categorias = Categoria::all();
                foreach ($categorias as $categoria) {
                    $lastMod = $categoria->updated_at ? $categoria->updated_at->format('Y-m-d') : date('Y-m-d');
                    $url = route('categoria.productos', ['slug' => $categoria->slug]);
                    
                    if (isset($categoria->imagen)) {
                        $sitemap .= $this->createSitemapItemWithImage(
                            $url,
                            '0.7',
                            'weekly',
                            $lastMod,
                            asset('storage/categorias/' . $categoria->imagen),
                            $categoria->nombre
                        );
                    } else {
                        $sitemap .= $this->createSitemapItem($url, '0.7', 'weekly', $lastMod);
                    }
                }
            } catch (\Exception $e) {
                // Continuar si hay error
            }
            
            // Agregar servicios
            try {
                $servicios = Servicio::all();
                foreach ($servicios as $servicio) {
                    $lastMod = $servicio->updated_at ? $servicio->updated_at->format('Y-m-d') : date('Y-m-d');
                    $url = route('servicio', ['slug' => $servicio->slug]);
                    
                    if (isset($servicio->imagen)) {
                        $sitemap .= $this->createSitemapItemWithImage(
                            $url,
                            '0.7',
                            'monthly',
                            $lastMod,
                            asset('storage/servicios/' . $servicio->imagen),
                            $servicio->titulo
                        );
                    } else {
                        $sitemap .= $this->createSitemapItem($url, '0.7', 'monthly', $lastMod);
                    }
                }
            } catch (\Exception $e) {
                // Continuar si hay error
            }
            
            // Agregar novedades
            try {
                $novedades = Novedades::all();
                foreach ($novedades as $novedad) {
                    $lastMod = $novedad->updated_at ? $novedad->updated_at->format('Y-m-d') : date('Y-m-d');
                    $url = route('novedad', ['id' => $novedad->id]);
                    
                    if (isset($novedad->imagen)) {
                        $sitemap .= $this->createSitemapItemWithImage(
                            $url,
                            '0.8',
                            'weekly',
                            $lastMod,
                            asset('storage/novedades/' . $novedad->imagen),
                            $novedad->titulo
                        );
                    } else {
                        $sitemap .= $this->createSitemapItem($url, '0.8', 'weekly', $lastMod);
                    }
                }
            } catch (\Exception $e) {
                // Continuar si hay error
            }
            
            $sitemap .= '</urlset>';
            
            return response($sitemap, 200)
                ->header('Content-Type', 'text/xml');
        });
    }
    
    private function createSitemapItem($url, $priority, $changefreq, $lastmod = null)
    {
        if ($lastmod === null) {
            $lastmod = date('Y-m-d');
        }
        
        return '
            <url>
                <loc>' . $url . '</loc>
                <changefreq>' . $changefreq . '</changefreq>
                <priority>' . $priority . '</priority>
                <lastmod>' . $lastmod . '</lastmod>
            </url>
        ';
    }
    
    private function createSitemapItemWithImage($url, $priority, $changefreq, $lastmod, $imageUrl, $imageCaption)
    {
        return '
            <url>
                <loc>' . $url . '</loc>
                <changefreq>' . $changefreq . '</changefreq>
                <priority>' . $priority . '</priority>
                <lastmod>' . $lastmod . '</lastmod>
                <image:image>
                    <image:loc>' . $imageUrl . '</image:loc>
                    <image:caption>' . htmlspecialchars($imageCaption) . '</image:caption>
                </image:image>
            </url>
        ';
    }
}
