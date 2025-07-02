@extends('layouts.app')
@section('title', 'Servicios')
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

<style>

</style>

<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        @foreach($servicios as $index => $servicio)
        @php
        // Manejo seguro: verificar si es ya un array o es una cadena JSON
        $galeria = $servicio->galeria;
        if (is_string($galeria)) {
            $galeria = json_decode($galeria, true) ?? [];
        }
        @endphp
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="800">
            <div class="bg-servicios mt-2" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#servicioModal{{ $servicio->id }}">
                <div class="imagen-container">
                    <img src="{{asset(Storage::url($servicio->imagen))}}" alt="{{$servicio->nombre}}">
                </div>
                <h5>{{$servicio->nombre}}</h5>
                {{-- hover --}}
                <div class="ver-mas">
                    <span class="ver-mas-text">Ver más</span>
                    <span class="ver-mas-icon">→</span>
                </div>
            </div>
        </div>
        
        <!-- Modal para el servicio -->
        <div class="modal fade" id="servicioModal{{ $servicio->id }}" tabindex="-1" aria-labelledby="servicioModalLabel{{ $servicio->id }}" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="servicioModalLabel{{ $servicio->id }}">{{ $servicio->nombre }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <!-- Galería de imágenes -->
                    @if(is_array($galeria) && count($galeria) > 0)
                    <div class="galeria-servicio">
                      <div 
                        class="fotorama"
                        data-transition="slide"
                        data-clicktransition="crossfade"
                        data-fit="cover"
                        data-keyboard="true"
                       
                        data-arrows="true"
                        data-click="true" 
                        data-height="500"
                        data-width="100%"
                        data-thumbmargin="20"
                        data-thumbwidth="100"
                        data-thumbheight="75"
                        data-loop="true"
                      >
                        @foreach($galeria as $img)
                          @if($img)
                          <img src="{{ asset(Storage::url($img)) }}" alt="{{$servicio->nombre}}">
                          @endif
                        @endforeach
                      </div>
                    </div>
                    @else
                    <img src="{{ asset(Storage::url($servicio->imagen)) }}" alt="{{ $servicio->nombre }}" class="img-fluid mb-3">
                    @endif
                  </div>
                  <div class="col-md-6">
                    <div class="d-flex flex-column h-100 justify-content-between">
                        <div>{!! $servicio->descripcion !!}</div>
                        <a href="{{ route('contacto') }}" class="btn btn__black">Solicitar presupuesto</a>

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Banner --}}
<div class="banner-single" style="background-image: url('{{ asset(Storage::url($inicio->banner)) }}');" data-aos="fade-up" data-aos-duration="1000">
    <div class="banner-overlay"></div>
    <div class="banner-content" data-aos="fade-up" data-aos-delay="300">
        <h5 class="carousel__titulo" data-aos="fade-up" data-aos-delay="400">{{ $inicio->titulo_banner }}</h5>
        <p class="carousel__descripcion" data-aos="fade-up" data-aos-delay="500">{!! $inicio->descripcion_banner !!}</p>
        <a type="button" href="{{ route('servicios') }}" class="btn btn__white mb-2" data-aos="zoom-in" data-aos-delay="600">Solicitar presupuesto</a>
    </div>
</div>

@endsection

@section('styles')
<style>
    .carousel-item-background {
        height: 100vh;
        min-height: 500px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    
    .carousel-caption-servicio {
        position: relative;
        left: auto;
        right: auto;
        bottom: auto;
        max-width: 600px;
        padding: 20px;
        background-color: rgba(0,0,0,0.5);
        color: white;
        margin: 0 auto;
        text-align: left;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar el carousel con énfasis en los indicadores
        var myCarousel = document.getElementById('carouselExampleIndicators');
        if (typeof bootstrap !== 'undefined') {
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                keyboard: true,
                pause: 'hover',
                wrap: true,
                touch: true
            });
            
            // Verificar si los indicadores funcionan
            var indicators = document.querySelectorAll('.carousel-indicators button');
            indicators.forEach(function(indicator, index) {
                indicator.addEventListener('click', function() {
                    carousel.to(index);
                });
            });
        }
    });
</script>
@endsection

