@extends('admin.layouts.master')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form method="post" action="{{route('admin.representaciones.update',$representacion->id)}}" enctype="multipart/form-data">
	@csrf
	@method('put')
  <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$representacion->titulo}}">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea class="form-control ckeditor" name="descripcion" id="descripcion" cols="30" rows="10" value="" >{{$representacion->descripcion}}</textarea>  
  </div>
  <div class="form-group">
    <label for="imagen">Imagen (tamaño 671 × 580 px)</label> <br>
    <input type="file" class="form-control-file my-3" id="imagen" name="imagen" value=""> <br>
    <img src="{{asset(Storage::url($representacion->imagen))}}" class="img-thumbnail w-25 mt-4 ">
  </div>
  <hr>


  <div class="form-group">
    <label for="pdf">PDF</label>
    <input type="file" class="form-control-file my-3" id="pdf" name="pdf" value="">
    @if($representacion->pdf)
      <a href="{{asset(Storage::url($representacion->pdf))}}" target="_blank">Ver PDF actual</a>
    @endif
  </div>
  <div class="form-group">
    <label for="video">Video</label>
    <input type="text" class="form-control" id="video" name="video" value="{{$representacion->video}}">
    <small class="form-text text-muted">Ingrese el ID del video de YouTube (ejemplo: lKDGxAHZt0E)</small>
  </div>
  <div class="form-group">
    <label for="videodos">Video 2</label>
    <input type="text" class="form-control" id="videodos" name="videodos" value="{{$representacion->videodos}}">
    <small class="form-text text-muted">Ingrese el ID del segundo video de YouTube (ejemplo: lKDGxAHZt0E)</small>
  </div>
  <div class="form-group">
    <label for="videotres">Video 3</label>
    <input type="text" class="form-control" id="videotres" name="videotres" value="{{$representacion->videotres}}">
    <small class="form-text text-muted">Ingrese el ID del tercer video de YouTube (ejemplo: lKDGxAHZt0E)</small>
  </div>


  {{-- <div class="form-group col-md-6">
    <label for="video">video</label>
    <input type="text" class="form-control" id="video" name="video" value="{{$representacion->video}}">
    https://www.youtube.com/watch?v=<strong>lKDGxAHZt0E&list</strong>
  </div> --}}

  
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-success ">Editar</button>

  </div>
</form>
    
  
 
@endsection
