@extends('layouts.app')
@section('title', $novedad->titulo)
@section('content')

<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('novedades')}}" class="breadcrumb-item">Novedades</a></li>
            <li class="breadcrumb-item active" >{{ $novedad->titulo }}</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
  </div>
</div>

<div class="container my-5" style="padding-bottom: 150px" >
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