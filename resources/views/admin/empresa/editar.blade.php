@extends('admin.layouts.master')

@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<form method="post" action="{{route('admin.empresa.update',$empresa->id)}}" enctype="multipart/form-data">
	@csrf
	@method('put')
  {{-- <div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" value="{{$empresa->titulo}}">
  </div> --}}
  <div class="row">
    <div class="form-group col-md-6">
      <label for="descripcion_izq">Descripcion_izq</label>
      <textarea class="form-control summernote" name="descripcion_izq" id="descripcion_izq" cols="30" rows="10" value="" >{{$empresa->descripcion_izq}}</textarea>  
    </div>

    <div class="form-group col-md-6">
      <label for="descripcion">Descripcion_der</label>
      <textarea class="form-control summernote" name="descripcion_der" id="descripcion_der" cols="30" rows="10" value="" >{{$empresa->descripcion_der}}</textarea>  
    </div>
  </div>

  <div class="form-group col-md-6 my-3 ">
    <label for="galeria">Galería 288x288px</label> <br>
    <input type="file" class="form-control-file" id="galeria" name="galeria[]" multiple>
    @if ($empresa->galeria)
    <div class="image-gallery d-flex flex-wrap my-5">
        @foreach (json_decode($empresa->galeria, true) as $key => $galerias)
            <div class="image-container position-relative mr-2 mb-2" id="image-{{ $key }}">
                <img src="{{ asset(Storage::url($galerias)) }}" alt="" class="gallery-image">
                <button class="btn btn-danger btn-sm delete-image position-absolute" data-id="{{ $empresa->id }}" data-key="{{ $key }}">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endforeach
    </div>
    @else
        @if (!empty($empresa->galeria))
            <p>No hay imágenes en la galería.</p>
        @endif
    @endif
</div> 
  {{-- <div class="form-group">
    <label for="galeria">galeria (tamaño 671 × 580 px)</label> <br>
    <input type="file" class="form-control-file my-3" id="galeria" name="galeria[]" multiple> <br>
    <div class="row">
        @php
            $galeria = $empresa->galeria ? json_decode($empresa->galeria, true) : [];
        @endphp
        @if($galeria)
            @foreach($galeria as $index => $img)
                <div class="col-md-3 mb-4" id="image-{{ $index }}">
                    <div class="card">
                        <div class="position-relative">
                            <img src="{{ asset('storage/'.$img) }}" class="card-img-top" alt="Imagen galería">
                            <button type="button" class="btn btn-sm btn-danger delete-image position-absolute" 
                                    style="top: 5px; right: 5px;" 
                                    data-id="{{ $empresa->id }}" 
                                    data-image-path="{{ $img }}" 
                                    data-key="{{ $index }}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p>No hay imágenes en la galería</p>
            </div>
        @endif
    </div>
  </div> --}}

  
  <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-success ">Editar</button>
  </div>
</form>


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
                    url: "{{ url('admin/empresa') }}/eliminar-imagen/" + id + "/" + key,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#image-' + key).remove();
                            toastr.success('Imagen eliminada correctamente');
                        } else {
                            toastr.error('Error al eliminar la imagen');
                        }
                    },
                    error: function(response) {
                        toastr.error('Error al eliminar la imagen');
                    }
                });
            }
        });
    });
});
</script>
@endpush

@endsection
