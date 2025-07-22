@extends('admin.layouts.master')

@section('content')
<h3>Editar proceso</h3>
<form method="post" action="{{ route('admin.procesos.update', ['id' => $proceso->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Para indicar que es un método PUT (actualización) --}}
    <div class="row">
        <div class="form-group col-md-4">
            <label for="orden">Orden</label>
            <input type="text" class="form-control" id="orden" name="orden" value="{{ $proceso->orden }}">
        </div>
        <div class="form-group col-md-4">
            <label for="paso">paso</label>
            <input type="text" class="form-control" id="paso" name="paso" value="{{ $proceso->paso }}">
        </div>
        <div class="form-group col-md-4">
            <label for="nombre">nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proceso->nombre }}">
        </div>
        
    </div>


    <div class="row">
        <div class="form-group col-md-12">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control ckeditor" name="descripcion" id="descripcion" cols="30" rows="10">{{ $proceso->descripcion }}</textarea>
        </div>
    </div>

    

   

    <div class="d-flex justify-content-start">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
