@extends('admin.layouts.master')

@section('content')
<h3>Nuevo Producto</h3>
<form method="post" action="{{ route('admin.productos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden">
        </div>
        <div class="form-group col-md-6">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
       
    </div>

    <div class="row my-3">
        {{-- categoria --}}
        <div class="form-group col-md-6">
            <label for="categoria_id">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control ckeditor" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        </div>
    </div>

 

    <div class="row my-3">
        <div class="form-group col-md-6 my-4">
            <label for="imagen">Imagen 900x675px</label> <br>
            <input type="file" class="form-control-file" required id="imagen" name="imagen">
        </div>
        <div class="form-group col-md-6 my-4">
            <label for="pdf">pdf </label> <br>
            <input type="file" class="form-control-file"  id="pdf" name="pdf">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="video">Video</label>
            <input type="text" class="form-control" id="video" name="video" placeholder="URL del video">
        </div>
        <div class="form-group col-md-4">
            <label for="videodos">Video 2</label>
            <input type="text" class="form-control" id="videodos" name="videodos" placeholder="URL del segundo video">
        </div>
        <div class="form-group col-md-4">
            <label for="videotres">Video 3</label>
            <input type="text" class="form-control" id="videotres" name="videotres" placeholder="URL del tercer video">
        </div>
    </div>

   <div class="row my-4">
        <div class="form-group col-md-12">
            <label for="galeria">Galeria Tamaño · 225 x 225</label><br>
            <input type="file" class="form-control-file" id="galeria" name="galeria[]" multiple>
        </div>
    </div> 

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</form>
@endsection


