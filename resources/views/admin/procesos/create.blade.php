@extends('admin.layouts.master')

@section('content')
<h3>Nuevo proceso</h3>
<form method="post" action="{{ route('admin.procesos.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden">
        </div>
        <div class="form-group col-md-4">
            <label for="paso">paso</label>
            <input type="text" class="form-control" id="paso" name="paso">
        </div>
        <div class="form-group col-md-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
       
    </div>

<hr>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control summernote" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        </div>
    </div>

 

  

  

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</form>
@endsection


