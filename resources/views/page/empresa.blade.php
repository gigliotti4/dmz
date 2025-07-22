@extends('layouts.app')
@section('title', 'Empresa')
@section('content')

<div class="bg__breadcrumb">

  <div class="container">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('index')}}" class="breadcrumb-item">Inicio</a></li>
            <li class="breadcrumb-item active" >Nosotros</li>
          </ol>
          {{-- <span class="breadcrumb-titulo">Novedades</span> --}}
        </nav>
  </div>
</div>

<div class="container my-5">
  <div class="row">
     <div class="col-md-6">
          <div style="background-image: url('{{asset(Storage::url($empresa->imagen))}}');
          background-repeat:no-repeat;
          background-position:center;
          background-size:cover;
          height:500px;
          ">

          </div>
      </div>
      <div class="col-md-6">
     
          <h3 class="titulo__secciones">{{$empresa->titulo}}</h3>
          <p class="contenido__descripcion mt-3">{!!$empresa->descripcion!!}</p>
          {{-- <a type="button" href="" class="btn btn__azul mb-2 px-5" >MÁS INFORMACIÓN</a> --}}
   
       </div>
     
    
  </div>
</div>


<div class="my-5" style="background-color: #F5F5F5;">
  <div class="container">
      <div class="row py-5">
          <h3 class="titulo__secciones pb-3">¿Por qué elegirnos?</h3>
          <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1500">
              <div class="bg__card w-100 ">
                  <div class="p-4 text-center">
                      <img src="{{asset(Storage::url($empresa->icono_mision))}}"  style="height:50px;weight:50px;">
                      <h3 class="card__titulo my-4">Misión</h3>
                      <span class="card__texto">{!!$empresa->texto_mision!!}</span>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1500">
              <div class="bg__card w-100 ">
                  <div class="p-4 text-center">
                      <img src="{{asset(Storage::url($empresa->icono_vision))}}"  style="height:50px;weight:50px;">
                      <h3 class="card__titulo my-4">Visión</h3>
                      <span class="card__texto">{!!$empresa->texto_vision!!}</span>
                  </div>
              </div>
          </div>
          <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1500">
              <div class="bg__card w-100">
                  <div class="p-4 text-center">
                      <img src="{{asset(Storage::url($empresa->icono_valores))}}"  style="height:50px;weight:50px;">
                      <h3 class="card__titulo my-4">Valores</h3>
                      <span class="card__texto">{!!$empresa->texto_valores!!}</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

@endsection 

