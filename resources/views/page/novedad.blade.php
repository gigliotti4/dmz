@extends('layouts.app')
@section('title', $novedad->titulo)
@section('content')
<style>
  /* ===== CAROUSEL SERVICIOS ===== */
.carousel-item {
    height: 400px;
    position: relative;
}

.carousel-item-background {
    height: 100%;
    width: 100%;
    background-size: cover;
    background-position: center;
    position: absolute;
    top: 0;
    left: 0;
}

.carousel-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-video-wrapper {
    position: relative;
    height: 100%;
    width: 100%;
}

.carousel-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.carousel-video-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.41);
    z-index: 1;
}

.carousel-caption-servicio {
    position: absolute;
    text-align: left;
    left: 15%;
    bottom: 20px;
    right: auto;
    width: 70%;
    z-index: 2;
}

.carousel__titulo-servicio, .carousel__descripcion-servicio {
    color: white;
    font-family: 'Raleway';
    font-weight: 400;
    font-size: 36px;
    line-height: 130%;
    letter-spacing: 0%;
}

/* Estilos específicos para los indicadores del carousel */
.carousel-indicators {
    z-index: 15;
    bottom: 0px;
}


</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-bs-interval="5000" data-aos="fade-in" data-aos-duration="1200">
    <!-- Indicadores -->
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
        <button type="button" 
                data-bs-target="#carouselExampleIndicators" 
                data-bs-slide-to="{{ $index }}" 
                @if($index == 0) class="active" aria-current="true" @endif
                aria-label="Slide {{ $index + 1 }}">
        </button>
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
                        <div class="carousel-caption-servicio">
                            <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-item-background" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');"></div>
                    <div class="carousel-caption-servicio">
                        <h5 class="carousel__titulo-servicio">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion-servicio">{!! $slider->descripcion !!}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    
 
</div>

<div class="container my-5" style="padding-bottom: 150px" data-aos="fade-up" data-aos-duration="1000">
    <div class="row justify-content-center">
        <div class="col-md-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
            @php
                // Decodificar la galería de forma segura
                $galeria_items = $novedad->galeria ? json_decode($novedad->galeria) : [];
            @endphp

            {{-- Verificar si hay imágenes en la galería --}}
            @if(is_array($galeria_items) && count($galeria_items) > 0)
                {{-- IMPLEMENTACIÓN FOTORAMA --}}
                <div class="fotorama"
                     {{-- data-nav="thumbs" --}}
                     data-allowfullscreen="true"
                     data-autoplay="true"
                     data-transition="crossfade"
                     data-width="100%"
                     data-height="500"
                     data-ratio="16/9"
                     data-fit="cover">

                    {{-- Imágenes de la galería --}}
                    @foreach($galeria_items as $index => $imagen)
                        <img src="{{ asset(Storage::url($imagen)) }}" class="w-100" data-aos="zoom-in" data-aos-delay="{{ 300 + ($index * 100) }}">
                    @endforeach
                </div>
            @elseif($novedad->imagen)
                {{-- Mostrar imagen principal si no hay galería --}}
                <img src="{{ asset(Storage::url($novedad->imagen)) }}" class="img-fluid" alt="{{ $novedad->titulo }}" style="width: 100%; height: 500px; object-fit: cover;" data-aos="zoom-in" data-aos-delay="300">
            @else
                {{-- Mensaje si no hay ni galería ni imagen principal --}}
                 <p class="text-center">No hay imágenes disponibles.</p>
            @endif
        </div>
        <div class="col-md-6" data-aos="fade-left" data-aos-delay="400" data-aos-duration="800">
            <h3 class="titulo-empresa" data-aos="fade-up" data-aos-delay="500">{{ $novedad->titulo }}</h3>
            <span class="descripcion-empresa" data-aos="fade-up" data-aos-delay="600">{!! $novedad->descripcion !!}</span>
        </div>
    </div>
</div>

@endsection