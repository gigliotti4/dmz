@extends('layouts.app')
@section('title', 'Novedades')
@section('content')


{{-- novedades --}}
<style>

    .card-categoria{
        font-family: 'Roboto';
        font-weight: 600;
        font-style: 'SemiBold';
        font-size: 16px;
        color: #FE6D00  ;
        text-transform: uppercase;
        line-height: 100%;
        letter-spacing: 0%;

    }
    .card-title {
        color: #000;
        font-family: 'Roboto';
        font-weight: 700;
        font-size: 24px;
        line-height: 100%;
        letter-spacing: 0%;
    }

    .card-text-corto {
      font-family: 'Roboto';
        font-weight: 400;
        font-style: 'Regular';
        font-size: 16px;

        line-height: 20px;
        letter-spacing: 0%;

    }

    .blog-card {
        transition: all 0.3s ease;
        border: none;
    }

    .blog-card:hover {
        transform: translateY(-10px);
    }

    .blog-card a {
        text-decoration: none;
        color: inherit;
        display: block;
    }

    .blog-card img {

        transition: all 0.3s ease;
    }

    .blog-card:hover img {

        opacity: 0.9;
    }
    
    /* Nuevo estilo simplificado para "Ver más" */
    .ver-mas-wrapper {
        text-align: right;
        margin-top: 15px;
    }
    
    .ver-mas-link {
        display: inline-block;
        font-weight: 600;
        color: #333;
        transition: all 0.3s ease;
        position: relative;
        padding-right: 20px;
    }
    
    .ver-mas-link::after {
        content: "→";
        position: absolute;
        right: 0;
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .blog-card:hover .ver-mas-link {
        padding-right: 30px;
        color: #000;
    }
    
    .blog-card:hover .ver-mas-link::after {
        opacity: 1;
    }
</style>

<div class="container my-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="row mt-5">
        @foreach ($novedades as $index => $novedad)
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $index * 150 }}" data-aos-duration="800">
            <div class="card blog-card">
                <a href="{{ route('novedad', $novedad->id) }}" class="text-decoration-none text-dark">
                    <img src="{{ asset(Storage::url($novedad->imagen)) }}" class="w-100" alt="...">
                    <div class="pt-3">
                        <h5 class="card-categoria">{{ $novedad->categoria }}</h5>
                        <h5 class="card-title">{{ $novedad->titulo }}</h5>
                        <div class="card-text-corto">{!! Str::limit($novedad->descripcion, 80, '...') !!}</div>
                        {{-- ver mas --}}
                        <div class="ver-mas-wrapper">
                            <span class="ver-mas-link">Ver más</span>
                        </div>    
                    </div>
                  
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection