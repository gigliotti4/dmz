@extends('layouts.app')
@section('title', 'Servicios')
@section('content')
<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item active" >Servicios</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
  </div>
</div>


<div class="container my-5" >
    <div class="row">

        @foreach($servicios as $index => $servicio)
        <div class="col-12 col-md-6 " data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" data-aos-duration="800">
            <a href="{{ route('servicio', $servicio->slug ?? $servicio->id) }}" class="servicio-link">
                <div class="bg-servicios mt-4" style="background-image: url('{{asset(Storage::url($servicio->imagen))}}');
                height: 300px; background-size: cover; background-position: center;">
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
@endsection



