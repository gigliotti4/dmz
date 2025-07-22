@extends('layouts.app')
@section('title', $categoria->nombre)
@section('content')

<div class="bg__breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categorias') }}" class="breadcrumb-item">Categorías</a></li>
                <li class="breadcrumb-item active">{{ $categoria->nombre }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container my-5">

    <div class="row mt-4">
        @forelse($productos as $producto)
        <div class="col-md-4 mb-4">
            <a href="{{ route('producto', $producto->slug) }}" class="text-decoration-none">
                <div class="card">
                    <div class="card-img-categoria">
                        <div class="card-img-inner" style="background-image: url('{{ asset(Storage::url($producto->imagen)) }}')"></div>
                        <div class="card-content">
                            <h5>{{ $producto->nombre }}</h5>
                            <span class="ver-mas-link">Ver más <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p>No hay productos disponibles en esta categoría.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
