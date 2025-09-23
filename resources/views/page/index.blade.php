@extends('layouts.app')

@section('content')


<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
    <!-- Indicadores en la parte superior (opcional) -->
    <div class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <button type="button" 
                    data-bs-target="#carouselExampleIndicators" 
                    data-bs-slide-to="{{ $index }}" 
                    class="{{ $index == 0 ? 'active' : '' }}" 
                    aria-current="{{ $index == 0 ? 'true' : 'false' }}" 
                    aria-label="Slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>

    <!-- Contenido del carousel -->
    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            @if(Str::contains($slider->imagen, ['.mp4', '.mov', '.avi']))
                <!-- Elemento - Video -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="carousel-video-wrapper position-relative">
                        <video class="carousel-video w-100" autoplay loop muted playsinline>
                            <source src="{{ asset(Storage::url($slider->imagen)) }}" type="video/mp4">
                            Tu navegador no soporta video HTML5.
                        </video>
                        
                        <!-- Overlay para el contenido -->
                        <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
                            <div class="container text-center">
                                <h1 class="carousel-title display-4 fw-bold text-white mb-3">
                                    {{ $slider->titulo }}
                                </h1>
                                <p class="carousel-subtitle lead text-white mb-4">
                                    {!! $slider->descripcion !!}
                                </p>
                                <a href="{{ route('contacto') }}" class=" btn-lg carousel-btn">
                                    MÁS INFORMACIÓN
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Elemento - Imagen -->
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset(Storage::url($slider->imagen)) }}" 
                         class="d-block w-100 carousel-imagen" 
                         alt="{{ $slider->titulo }}"
                         style="height: 700px; object-fit: cover;">
                    
                    <!-- Overlay para el contenido -->
                    <div class="carousel-caption d-flex align-items-center justify-content-center h-100">
                        <div class="container text-center">
                            <h1 class="carousel-title display-4 fw-bold text-white mb-3">
                                {{ $slider->titulo }}
                            </h1>
                            <p class="carousel-subtitle lead text-white mb-4">
                                {!! $slider->descripcion !!}
                            </p>
                            <a href="{{ route('contacto') }}" class=" btn-lg carousel-btn">
                                MÁS INFORMACIÓN
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Controles de navegación -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>

<div class="container my-5">
 <h3 class="text-center mb-5 titulo-secciones" data-aos="fade-up">Nuestras Categorías</h3>
    <div class="row mt-4">
        @foreach($categorias as $categoria)
        <div class="col-md-6 mb-4">
            <a href="{{ route('categoria.productos', $categoria->slug) }}" class="text-decoration-none">
                <div class="card">
                    <div class="card-img-categoria">
                        <div class="card-img-inner" style="background-image: url('{{ asset(Storage::url($categoria->imagen)) }}')"></div>
                        <div class="card-content">
                            <h5>{{ $categoria->nombre }}</h5>
                            <span class="ver-mas-link">Ver más <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>



        
{{-- servicios --}}

<div class="container-fluid my-5" >
    <div class="row">
        <h3 class="text-center mb-5 titulo-secciones" data-aos="fade-up">Nuestros servicios</h3>
        @foreach($servicios as $index => $servicio)
        <div class="col-12 col-md-3 p-0" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="800">
            <a href="{{ route('servicio', $servicio->slug ?? $servicio->id) }}" class="servicio-link">
                <div class="bg-servicios mt-2" style="background-image: url('{{asset(Storage::url($servicio->imagen))}}');">
                    <div class="servicio-content">
                        <h5 class="servicio-title">{{$servicio->nombre}}</h5>
                    </div>
                    <div class="servicio-overlay">
                           <h5 class="servicio-title">{{$servicio->nombre}}</h5>
                        <p class="servicio-descripcion">{!! $servicio->descripcion ?? 'Conoce más sobre este servicio' !!}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        
    </div>
</div>

{{-- Banner proyecto --}}
<div class="banner-single my-5" style="background-color: #000;">
    <div class="banner-overlay"></div>
    <div class="banner-content">    
        <h5 class="">¿Tenés un proyecto? Hablemos</h5>
        <p class="">Te ayudamos a encontrar la solución más eficiente.</p>
        <a href="{{ route('contacto') }}" class="carousel-btn">Contactanos</a>
    </div>
</div>







{{-- Contenido Inicio --}}
<div class="mt-5 container-fluid" style="overflow: hidden" >
    <div class="row">
        <div class="col-md-6" style="background-color: #EEEEEE; display: flex; align-items: center; height: 600px;">
            <div class="p-5 text-left" data-aos="fade-up" data-aos-duration="1500">
                <h3 class="contenido__subtitulo">Sobre Nosotros</h3>
                <h3 class="contenido__titulo pe-5">{{$inicio->titulo}}</h3>
                <div class="contenido__descripcion my-5">{!!$inicio->descripcion!!}</div>
                <a type="button" href="{{ route('empresa') }}" class="carousel-btn">Conoce más</a>
            </div>
        </div>

        <div class="col-md-6 p-0">
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
{{-- <div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
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
</div> --}}



{{-- Banner --}}
<div class="banner-single my-5" style="background-image: url('{{ asset(Storage::url($inicio->banner)) }}');">
    <div class="banner-overlay"></div>
    <div class="banner-content">
        <div class="d-flex justify-content-center align-items-center ">
            <h5 class="me-5">{{ $inicio->titulo_banner }}</h5>
            <img src="{{asset('img/sanco.png')}}" alt="" style="width: 150px; height: auto; margin-bottom: 15px;">
        </div>
        <p class="">{!! $inicio->descripcion_banner !!}</p>
      
    </div>
</div>

@endsection


