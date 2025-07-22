@extends('layouts.app')
@section('title', $servicio->nombre)
@section('content')

<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('servicios')}}" class="breadcrumb-item">Servicios</a></li>
            <li class="breadcrumb-item active" >{{$servicio->nombre}}</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
  </div>
</div>

<div class="container my-5">
  <div class="row">
     <div class="col-md-6">
          <div style="background-image: url('{{asset(Storage::url($servicio->imagen))}}');
          background-repeat:no-repeat;
          background-position:center;
          background-size:cover;
          height:500px;
          ">

          </div>
      </div>
      <div class="col-md-6 d-flex flex-column" style="max-height: 500px;">
          <div>
              <h3 class="titulo__secciones">{{$servicio->nombre}}</h3>
              <p class="contenido__descripcion mt-3">{!!$servicio->descripcion!!}</p>
          </div>
          {{-- este button abajo de todo donde termina la foto --}}
          <div class="mt-auto">
               <a href="{{ route('contacto') }}" class="carousel-btn px-5">Consultar </a>
          </div>
       </div>   
  </div>
  {{-- galeria --}}
    <div class="row mt-5">
        <div class="col-md-12">
        <h3 class="titulo__secciones">Galería</h3>
        <div class="row ">      
            @foreach($servicio->galeria as $imagen)
            <div class="col-md-3 mt-3">
                <div class="galeria__imagen" style="background-image: url('{{asset(Storage::url($imagen))}}');
                background-repeat:no-repeat;
                background-position:center;
                background-size:cover;
                height:300px;
                "></div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</div>

@endsection