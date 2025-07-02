@extends('admin.layouts.master')

@section('content')

<a href="{{ route('admin.procesos.create') }}" class="btn btn-success mb-5">Nuevo Proceso</a>

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Orden</th>
           
            <th>Titulo</th>
    
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($procesos as $prod)
    <tr>
        <td>{{ $prod->orden }}</td>
 
        <td>{{ $prod->nombre }}</td>
       
         
       
        <td>
            {{-- <a class="btn btn-primary" href="{{ route('admin.procesos.index_colores', $prod->id) }}" role="button">Colores</a> --}}
            <a class="btn btn-warning" href="{{ route('admin.procesos.edit', ['id' => $prod->id]) }}" role="button"><i class="fas fa-edit"></i></a>
            <form action="{{ route('admin.procesos.destroy', ['id' => $prod->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>
@endforeach

    </tbody>
</table>

@endsection
