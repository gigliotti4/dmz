@extends('admin.layouts.master')  

@section('content')
<form method="post" action="{{route('admin.servicios.update',$servicio->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$servicio->orden}}">   
  </div>
<div class="form-group col-md-6 my-4">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$servicio->nombre}}">   
  </div>
{{-- descripcion --}}
<div class="row">
    <div class="form-group col-md-12">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control ckeditor" name="descripcion" id="descripcion" cols="30" rows="10">{!! $servicio->descripcion !!}</textarea>
    </div>
</div>

  <div class="form-group col-md-6 my-4">
    <label for="imagen">Icono 83x83px</label> <br>
    <input type="file" class="form-control-file" id="imagen" name="imagen">
    @if($servicio->imagen)
        <p>Imagen actual:</p>
        <img src="{{asset(Storage::url($servicio->imagen))}}" class="img-thumbnail mt-2 w-25">
    @endif
</div>

 <div class="form-group col-md-6 my-3 ">
  <label for="galeria">Galería 288x288px</label> <br>
  <input type="file" class="form-control-file" id="galeria" name="galeria[]" multiple>
  @if ($servicio->galeria)
  <div class="image-gallery d-flex flex-wrap my-5">
      @foreach ($servicio->galeria as $key => $galerias)
          <div class="image-container position-relative mr-2 mb-2" id="image-{{ $key }}">
              <img src="{{ asset(Storage::url($galerias)) }}" alt="" class="gallery-image">
              <button class="btn btn-danger btn-sm delete-image position-absolute" data-id="{{ $servicio->id }}" data-key="{{ $key }}">
                  <i class="fas fa-times"></i>
              </button>
          </div>
      @endforeach
  </div>
  @else
      @if (!empty($servicio->galeria))
          <p>No hay imágenes en la galería.</p>
      @endif
  @endif
</div> 


 <button type="submit" class="btn btn-primary">Editar</button>
</form>


@endsection
@push('scripts')
<script>
$(document).ready(function() {


   

    $('.delete-image').click(function(e) {
        e.preventDefault();
        
        var id = $(this).data('id');
        var key = $(this).data('key');

        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.servicios.eliminar_imagen', ['id' => ':id', 'key' => ':key']) }}".replace(':id', id).replace(':key', key),
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#image-' + key).fadeOut('slow', function() {
                                $(this).remove();
                            });
                            toastr.success(response.message || 'Imagen eliminada correctamente');
                        } else {
                            toastr.error(response.message || 'Error al eliminar la imagen');
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastr.error('Error al eliminar la imagen');
                    }
                });
            }
        });
    });
});
</script>
@endpush