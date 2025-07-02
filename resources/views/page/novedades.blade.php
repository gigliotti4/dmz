@extends('layouts.app')
@section('title', 'Blog')
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


{{-- novedades --}}
<style>
    .card-title {
        color: #000;
        font-family: 'Raleway';
        font-weight: 700;
        font-size: 24px;
        line-height: 100%;
        letter-spacing: 0%;
    }

    .card-text-corto {
        font-family: 'Raleway';
        font-weight: 300;
        font-size: 20px;
        line-height: 100%;
        letter-spacing: 0%;
        color: #000;
    }

    .blog-card {
        transition: all 0.3s ease;
        border: none;
    }

    .blog-card:hover {
        transform: translateY(-10px);
    }

    .blog-card a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .blog-card img {
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .blog-card:hover img {
        border-radius: 10px;
        opacity: 0.9;
    }
    
    /* Nuevo estilo simplificado para "Ver más" */
    .ver-mas-wrapper {
        text-align: right;
        margin-top: 15px;
    }
    
    .ver-mas-link {
        display: inline-block;
        font-weight: 600;
        color: #333;
        transition: all 0.3s ease;
        position: relative;
        padding-right: 20px;
    }
    
    .ver-mas-link::after {
        content: "→";
        position: absolute;
        right: 0;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .blog-card:hover .ver-mas-link {
        padding-right: 30px;
        color: #000;
    }
    
    .blog-card:hover .ver-mas-link::after {
        opacity: 1;
    }
</style>

<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
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
    </div>
</div>

@endsection