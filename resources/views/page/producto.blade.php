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
            </div>
      </div>
    </div>
</div>

</div>


@endsection

