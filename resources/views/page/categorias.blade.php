@extends('layouts.app')
@section('title', 'Categorías')
@section('content')

<div class="bg__breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}" class="breadcrumb-item">Inicio</a></li>
                <li class="breadcrumb-item active">Categorías</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container my-5">
 
    
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
@endsection