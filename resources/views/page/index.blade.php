@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false" data-aos="fade-in" data-aos-duration="1200">
    <!-- Indicadores -->
    <div class="carousel-indicators justify-content-center">
        @foreach($sliders as $index => $slider)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            @if(Str::contains($slider->imagen, ['.mp4', '.mov', '.avi']))
                <!-- Elemento - Video -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-video-wrapper">
                        <video class="carousel-video" autoplay loop muted>
                            <source src="{{ asset(Storage::url($slider->imagen)) }}" type="video/mp4">
                            Tu navegador no soporta video HTML5.
                        </video>
                        <div class="carousel-caption text-left" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                            @if($index == 0)
                            <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="500">Solicitar Presupuesto Gratuito</a>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');">
                    <div class="carousel-caption text-left" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                        <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                        @if($index == 0)
                        <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2" data-aos="zoom-in" data-aos-delay="600" data-aos-duration="500">Solicitar Presupuesto Gratuito</a>
                        @endif
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
        
{{-- servicios --}}
<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        <h3 class="text-center mb-5 titulo-secciones" data-aos="fade-up">Nuestros servicios</h3>
        @foreach($servicios as $index => $servicio)
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="800">
            <div class="bg-servicios mt-2">
                <div class="imagen-container">
                    <img src="{{asset(Storage::url($servicio->imagen))}}" alt="{{$servicio->nombre}}">
                </div>
                <h5>{{$servicio->nombre}}</h5>
            </div>
        </div>
        @endforeach
        <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
            <a type="button" href="{{ route('servicios') }}" class="btn btn__black mb-2">Ver todos</a>
        </div>
    </div>
</div>

{{-- Contenido Inicio --}}
<div class="mt-5" style="overflow: hidden" data-aos="fade-up" data-aos-duration="1500">
    <div class="row">
       

        <div class="col-md-7 p-0">
            <div style="background-image: url('img/interiorismo.jpg');
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            height:600px;">
            </div>
        </div>
         <div class="col-md-5" style="background-color: #131313; display: flex; align-items: center; height: 600px;">
            <div class="p-5 text-left">
                {{-- <h3 class="contenido__subtitulo">Sobre Nosotros</h3> --}}
                <h3 class="contenido__titulo">Proyectos de Interiorismo</h3>
                <div class="contenido__descripcion my-5">Creamos espacios únicos que reflejan tu estilo, combinando funcionalidad, estética y atención al detalle para transformar cada ambiente en una experiencia inolvidable de tu hogar</div>
                <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2 px-5">Solicitar presupuesto</a>
            </div>
        </div>
    </div>
</div>

{{-- Contenido procesos --}}
<div class="contianer mt-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="step-container">
        <h3 class="text-center titulo-secciones mb-5" data-aos="fade-up" data-aos-delay="100">Como llevar tu proyecto a la realidad en 4 pasos</h3>
    
        @foreach($procesos as $index => $proceso)
        <div class="step-header" data-aos="fade-right" data-aos-delay="{{ $index * 150 }}">
          <span class="step-number">{{$proceso->paso}}</span>
          <span class="step-separator"></span>
          <span class="step-title">{{$proceso->nombre}}</span>
        </div>
        <p class="step-description" data-aos="fade-up" data-aos-delay="{{ $index * 150 + 100 }}">{!!$proceso->descripcion!!}</p>
        @endforeach
        <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800">
            <a type="button" href="{{ route('contacto') }}" class="btn btn__black mb-2">Contáctanos ahora</a>
        </div>
    </div>
</div>


{{-- productos --}}
<div class="container my-5" data-aos="fade-up" data-aos-duration="1200">
    <h3 class="text-center titulo-secciones" data-aos="fade-up">Échale un vistazo a nuestros catálogos.</h3>
    
    <div class="row mt-5">
        @foreach($productos as $index => $producto)
        <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="800">
            <a href="{{route('producto', $producto->slug)}}" class="text-decoration-none text-dark">
                <div class="card h-100 border-0 shadow-sm">
                    <!-- Imagen de la Categoría con efecto zoom -->
                    <div class="card-img-categoria">
                        <div class="card-img-inner" style="background-image: url('{{ asset(Storage::url($producto->imagen)) }}');"></div>
                        <!-- Contenido con título y ver más -->
                        <div class="card-content">
                            <h5 class="text-white m-0">{{ $producto->nombre }}</h5>
                            <span class="ver-mas-link">Ver más <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="200">
            <a type="button" href="{{ route('productos') }}" class="btn btn__black mb-2">Ver todos</a>
        </div>
    </div>
</div>

{{-- Contenido Inicio --}}
<div class="mt-5" style="overflow: hidden" data-aos="fade-up" data-aos-duration="1500">
    <div class="row">
        <div class="col-md-5" style="background-color: #131313; display: flex; align-items: center; height: 600px;">
            <div class="p-5 text-left">
                <h3 class="contenido__subtitulo">Sobre Nosotros</h3>
                <h3 class="contenido__titulo">{{$inicio->titulo}}</h3>
                <div class="contenido__descripcion my-5">{!!$inicio->descripcion!!}</div>
                <a type="button" href="{{ route('empresa') }}" class="btn btn__white mb-2 px-5">Conoce más</a>
            </div>
        </div>

        <div class="col-md-7 p-0">
            <div style="background-image: url('{{asset(Storage::url($inicio->imagen))}}');
            background-repeat:no-repeat;
            background-position:center;
            background-size:cover;
            height:600px;">
            </div>
        </div>
    </div>
</div>

{{-- Blog --}}
<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <h3 class="titulo-secciones text-center" data-aos="fade-up">No te pierdas ninguna noticia</h3>
    <h3 class="subtitulo-secciones text-center" data-aos="fade-up" data-aos-delay="100">Nuestro Blog</h3>
    <div class="row mt-5">
        @foreach ($novedades as $index => $novedad)
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" data-aos-duration="800">
            <div class="card blog-card">
                <a href="{{ route('novedad', $novedad->id) }}" class="text-decoration-none text-dark">
                    <img src="{{ asset(Storage::url($novedad->imagen)) }}" class="w-100" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $novedad->titulo }}</h5>
                        <div class="card-text-corto">{!! Str::limit($novedad->descripcion, 80, '...') !!}</div>
                        {{-- ver mas --}}
                        <div class="ver-mas-wrapper">
                            <span class="ver-mas-link">Ver más</span>
                        </div>    
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
            <a type="button" href="{{ route('novedades') }}" class="btn btn__black mb-2">Ver todos</a>
        </div>
    </div>
</div>

{{-- Banner --}}
<div class="banner-single" style="background-image: url('{{ asset(Storage::url($inicio->banner)) }}');">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <h5 class="carousel__titulo">{{ $inicio->titulo_banner }}</h5>
        <p class="carousel__descripcion">{!! $inicio->descripcion_banner !!}</p>
        <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2">Solicitar presupuesto</a>
    </div>
</div>

@endsection


