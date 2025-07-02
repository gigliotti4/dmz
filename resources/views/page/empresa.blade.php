@extends('layouts.app')
@section('title', 'Empresa')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                        <div class="carousel-caption text-left">
                            <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                            <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}');">
                    <div class="carousel-caption text-left">
                        <h5 class="carousel__titulo">{{ $slider->titulo }}</h5>
                        <p class="carousel__descripcion">{!! $slider->descripcion !!}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="bg-empresa" data-aos="fade-up" data-aos-duration="1000">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
                <h3 class="empresa-titulo">Sobre Nosotros</h3>
                <p class="empresa-descripcion mt-3">{!!$empresa->descripcion_izq!!}</p>
            </div>
            <div class="col-md-6" data-aos="fade-left" data-aos-delay="400" data-aos-duration="800">
                <h3 class="empresa-titulo">¿Qué Hacemos?</h3>
                <p class="empresa-descripcion mt-3">{!!$empresa->descripcion_der!!}</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        <h3 class="text-center empresa-titulo" data-aos="zoom-in" data-aos-delay="200">Galeria</h3>
        <div class="brands-carousel" data-aos="fade-up" data-aos-delay="400">
            @php
              // Manejo seguro: verificar si es ya un array o es una cadena JSON
              $galeria = $empresa->galeria;
              if (is_string($galeria)) {
                  $galeria = json_decode($galeria, true) ?? [];
              }
            @endphp
            
            @if(is_array($galeria) && count($galeria) > 0)
              @foreach($galeria as $index => $imagen)
                <div class="brand-item px-2" data-aos="fade-up" data-aos-delay="{{ 500 + ($index * 100) }}">
                  <img src="{{ asset(Storage::url($imagen)) }}" alt="" class="img-fluid">
                </div>
              @endforeach
            @else
              <div class="brand-item px-2">
                <p class="text-center">No hay imágenes disponibles</p>
              </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
  $(document).ready(function(){
    $('.brands-carousel').slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 800,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true
          }
        }
      ]
    });
  });
</script>
@endpush

@endsection