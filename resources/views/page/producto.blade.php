@extends('layouts.app')
@section('title', $producto->nombre)
@section('content')


<style>
        .carousel-item-servicio{
    height: 350px;
    background-size: cover;
    background-position: center;
    position: relative; /* Añadir posición relativa para que el pseudo-elemento se posicione correctamente */
}

.carousel-item-servicio::before {
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
    z-index: 2; /* Aumentar z-index para que el texto esté sobre la sombra */
}

.carousel__titulo-servicio, .carousel__descripcion-servicio {
color: white;
    font-family: 'Raleway';
    font-weight: 400;
    font-size: 36px;
    line-height: 130%;
    letter-spacing: 0%;

}

/* Ajustes para el modal con Fotorama */
.modal-body .fotorama {
    margin: 0 auto;
}

.modal-xl {
    max-width: 1200px;
}
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-aos="fade-in" data-aos-duration="1200">
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
                        <div class="carousel-caption-servicio text-left">
                            <h5 class="carousel__titulo-servicio">{{ $producto->nombre }}</h5>
                          
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen como background -->
                <div class="carousel-item-servicio {{ $index == 0 ? 'active' : '' }}" style="background-image: url('{{ asset(Storage::url($slider->imagen)) }}'); 
                    ">
                    <div class="carousel-caption-servicio text-left" style="">
                        <h5 class="carousel__titulo-servicio">{{ $producto->nombre }}</h5>
                    
                      
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="row">
        <h3 data-aos="fade-up" data-aos-delay="200">{{$producto->nombre}}</h3>
        <span data-aos="fade-up" data-aos-delay="300">{!!$producto->descripcion!!}</span>

        @php
        // Manejo seguro: verificar si es ya un array o es una cadena JSON
        $galeria = $producto->galeria;
        if (is_string($galeria)) {
            $galeria = json_decode($galeria, true) ?? [];
        }
      @endphp

        @if(is_array($galeria) && count($galeria) > 0)
            <div class="row mt-4">
                @foreach($galeria as $index => $imagen)
                <div class="col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="{{ 400 + ($index * 100) }}" data-aos-duration="800">
                    <div class="imagen-producto-container">
                        <img src="{{ asset(Storage::url($imagen)) }}" alt="Imagen de producto" class="img-fluid imagen-producto" data-bs-toggle="modal" data-bs-target="#imagenModal" data-imagen="{{ asset(Storage::url($imagen)) }}">
                    </div>
                </div>
                @endforeach
            </div>
        @else
            @if($producto->imagen)
            <div class="row mt-4 justify-content-center" data-aos="fade-up" data-aos-delay="400">
                <div class="col-md-6 col-sm-8 mb-4">
                    <div class="imagen-producto-container">
                        <img src="{{ asset(Storage::url($producto->imagen)) }}" alt="{{ $producto->nombre }}" class="img-fluid imagen-producto" data-bs-toggle="modal" data-bs-target="#imagenModal" data-imagen="{{ asset(Storage::url($producto->imagen)) }}">
                    </div>
                </div>
            </div>
            @else
            <div class="row mt-4" data-aos="fade-up" data-aos-delay="400">
                <div class="col-12">
                    <p class="text-center">No hay imágenes disponibles</p>
                </div>
            </div>
            @endif
        @endif
    </div>
</div>

<!-- Modal para mostrar galería con Fotorama -->
<div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagenModalLabel">{{ $producto->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Fotorama -->
        <div class="fotorama" 
            
             data-arrows="true" 
             data-click="true" 
             data-swipe="true" 
             data-width="100%"
              data-height="500" 
             data-ratio="16/9"
             data-fit="cover"
        
             data-transition="crossfade">
          @if(is_array($galeria) && count($galeria) > 0)
            @foreach($galeria as $imagen)
              <a href="{{ asset(Storage::url($imagen)) }}" >
                <img src="{{ asset(Storage::url($imagen)) }}" alt="{{ $producto->nombre }}">
              </a>
            @endforeach
          @elseif($producto->imagen)
              <a href="{{ asset(Storage::url($producto->imagen)) }}" >
                <img src="{{ asset(Storage::url($producto->imagen)) }}" alt="{{ $producto->nombre }}">
              </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    const imagenModal = document.getElementById('imagenModal');
    
    imagenModal.addEventListener('show.bs.modal', function(event) {
      const imagen = event.relatedTarget;
      const src = imagen.getAttribute('data-imagen');
      
      // Si Fotorama está inicializada, mostrar la imagen correspondiente
      if (typeof $.fn.fotorama !== 'undefined') {
        setTimeout(() => {
          const $fotorama = $('.fotorama').data('fotorama');
          
          // Buscar el índice de la imagen clickeada
          let index = 0;
          $('.fotorama img').each(function(i) {
            if($(this).attr('src') === src) {
              index = i;
              return false;
            }
          });
          
          // Mostrar la imagen correspondiente
          if ($fotorama) {
            $fotorama.show(index);
          }
        }, 300);
      }
    });
  });
</script>

@endsection