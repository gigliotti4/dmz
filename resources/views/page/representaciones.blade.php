@extends('layouts.app')
@section('title', 'Representaciones')
@section('content')

<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item active" >Representaciones</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
  </div>
</div>

<div class="container my-5">
  <div class="row">
     <div class="col-md-6">
          <div style="background-image: url('{{asset(Storage::url($representaciones->imagen))}}');
          background-repeat:no-repeat;
          background-position:center;
          background-size:cover;
          height:500px;
          ">

          </div>
      </div>
      <div class="col-md-6">
        <div class="d-flex flex-column h-100">
          <h3 class="titulo__secciones">{{ $representaciones->titulo }}</h3>
          <div class="contenido__descripcion custom-item mt-3">{!! $representaciones->descripcion !!}</div>
          <div class="mt-auto">
            <a href="{{ route('contacto') }}" class="carousel-btn px-5">
              Consultar
            </a>  
            <a href="{{ asset(Storage::url($representaciones->pdf)) }}" download class="carousel-btn px-5">
             pdf
            </a>
            </div>
      </div>
     
    
  </div>
     @if($representaciones->video)
    <div class="row mt-5">
      <h3 class="titulo__secciones mb-4">Video</h3>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $representaciones->video }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $representaciones->videodos }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
        <div class="col-12 col-md-4 ">
            <div class="ratio ratio-16x9">
                <iframe src="{{ $representaciones->videotres }}" title="" allowfullscreen frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
    </div>
    @endif
</div>
</div>

@endsection