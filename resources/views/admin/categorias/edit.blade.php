@extends('admin.layouts.master')

@section('content')
<h3>Editar categoria</h3>
<form method="post" action="{{ route('admin.categorias.update', ['id' => $categorias->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Para indicar que es un método PUT (actualización) --}}
    <div class="row">
        <div class="form-group col-md-6">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden" value="{{ $categorias->orden }}">
        </div>
        
        <div class="form-group col-md-6">
            <label for="nombre">nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categorias->nombre }}">
        </div>
        
    </div>


    {{-- imagen --}}
    <div class="form-group col-md-6 my-3">
        <label for="imagen">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen">
        @if($categorias->imagen)
            <img src="{{ asset(Storage::url($categorias->imagen)) }}" alt="Imagen   de la categoria" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif
    </div>  

    {{-- check destacado --}}
    <div class="form-group col-md-6 my-3">
        <label for="destacado">Destacado</label>
        <input type="checkbox" class="form-check-input" id="destacado" name="destacado" {{ $categorias->destacado ? 'checked' : '' }}>
    </div>
    

    

   

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
