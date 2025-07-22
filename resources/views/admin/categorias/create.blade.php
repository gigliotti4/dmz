@extends('admin.layouts.master')

@section('content')
<h3>Nuevo categoria</h3>
<form method="post" action="{{ route('admin.categorias.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="form-group col-md-4">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden">
        </div>
      
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
       
    </div>

        {{-- imagen --}}
        <div class="form-group col-md-4">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>

        {{-- check destacado --}}
        <div class="form-group col-md-4 my-3">
            <label for="destacado">Destacado</label>
            <input type="checkbox" class="form-check-input" id="destacado" name="destacado">
        </div>


    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</form>
@endsection


