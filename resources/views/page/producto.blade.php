@extends('layouts.app')
@section('title', $producto->nombre)

@section('content')

<div class="bg__breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias') }}" class="breadcrumb-item">Categorías</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categoria.productos', $producto->categoria->slug) }}" class="breadcrumb-item">
                        {{ $producto->categoria->nombre }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $producto->nombre }}</li>     
            </ol>
        </nav>
    </div>
</div>

<style>
  /* Estilo mejorado para miniaturas Fotorama */
  .fotorama__nav {
    text-align: left !important; /* Asegura que las miniaturas empiecen desde la izquierda */
    margin-top: 10px;
  }

  .fotorama__thumb {
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    opacity: 0.7;
    transition: opacity 0.3s ease;
  }

  .fotorama__thumb:hover {
    opacity: 1;
  }

  .fotorama__stage {
    border: 1px solid #e0e0e0; 
    border-radius: 4px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  }

  .fotorama__thumb-border {
    border-color: #FE6D00 !important;
    border-radius: 4px;
    box-shadow: 0 0 8px rgba(254, 109, 0, 0.3);
  }

  /* Mejorar la navegación */
  .fotorama__arr {
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 50%;
  }

  .fotorama__arr:hover {
    background-color: rgba(255, 255, 255, 0.9);
  }
  
  /* Asegurar que los contenedores de navegación estén alineados a la izquierda */
  .fotorama__nav-wrap {
    text-align: left !important;
  }

  .fotorama__nav__shaft {
    margin-left: 0 !important;
    text-align: left !important;
  }
</style>

<div class="container my-5" >
    <div class="row">
      <div class="col-md-6">
        <!-- Fotorama -->
        <div class="fotorama" 
            data-arrows="true" 
            data-click="true" 
            data-swipe="true" 
            data-width="100%"
            data-height="500" 
            data-ratio="16/9"
            data-fit="cover"
            data-transition="crossfade"
            data-nav="thumbs"
            >
          @if(isset($producto->galeria) && !empty($producto->galeria))
            @php
              // Verificar si galería ya es un array o necesita ser convertido
              $imagenes = is_array($producto->galeria) ? $producto->galeria : explode(',', $producto->galeria);
            @endphp
            
            @foreach($imagenes as $imagen)
              <a href="{{ asset(Storage::url($imagen)) }}">
                <img src="{{ asset(Storage::url($imagen)) }}" alt="{{ $producto->nombre }}">
              </a>
            @endforeach
          @elseif($producto->imagen)
              <a href="{{ asset(Storage::url($producto->imagen)) }}">
                <img src="{{ asset(Storage::url($producto->imagen)) }}" alt="{{ $producto->nombre }}">
              </a>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="d-flex flex-column h-100">
          <h3 class="titulo__secciones">{{ $producto->nombre }}</h3>
          <div class="contenido__descripcion custom-item mt-3">{!! $producto->descripcion !!}</div>
          <div class="mt-auto">
            <a href="{{ route('contacto') }}" class="carousel-btn px-5">
              Consultar
            </a>  
            <a href="{{ asset(Storage::url($producto->pdf)) }}" download class="carousel-btn px-5">
             pdf
            </a>
            </div>
      </div>
    </div>
    
    {{-- Videos de youtube --}}
    @if($producto->video)
    <div class="row mt-5">
      <h3 class="titulo__secciones mb-4">Video</h3>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $producto->video }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $producto->videodos }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $producto->videotres }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
    </div>
    @endif
        </div>
</div>


@endsection

