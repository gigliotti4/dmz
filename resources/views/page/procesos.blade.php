@extends('layouts.app')
@section('title', 'Nuestro Proceso')
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

{{-- procesos --}}
<div class="step-container py-5" data-aos="fade-up" data-aos-duration="1000">
    <h3 class="text-center titulo-secciones mb-5" data-aos="zoom-in" data-aos-delay="200"> Como llevar tu proyecto a la realidad en 4 pasos</h3>
    @foreach($procesos as $index => $proceso)
    <div class="step-header" data-aos="fade-right" data-aos-delay="{{ $index * 150 }}">
      <span class="step-number">{{$proceso->paso}}</span>
      <span class="step-separator"></span>
      <span class="step-title">{{$proceso->nombre}}</span>
    </div>
    <p class="step-description" data-aos="fade-up" data-aos-delay="{{ $index * 150 + 100 }}">{!!$proceso->descripcion!!}</p>
    @endforeach
</div>

{{-- Banner --}}
<div class="banner-single" style="background-image: url('{{ asset(Storage::url($inicio->banner)) }}');" data-aos="fade-up" data-aos-duration="1000">
    <div class="banner-overlay"></div>
    <div class="banner-content" data-aos="fade-up" data-aos-delay="300">
        <h5 class="carousel__titulo" data-aos="fade-up" data-aos-delay="400">{{ $inicio->titulo_banner }}</h5>
        <p class="carousel__descripcion" data-aos="fade-up" data-aos-delay="500">{!! $inicio->descripcion_banner !!}</p>
        <a type="button" href="{{ route('contacto') }}" class="btn btn__white mb-2" data-aos="zoom-in" data-aos-delay="600">Solicitar presupuesto</a>
    </div>
</div>

@endsection