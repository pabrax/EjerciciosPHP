@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Tareas</h1>
        <div>
            <a href="{{ route('tareas.create') }}" class="btn btn-primary">Nueva Tarea</a>
        </div>
    </div>
    <hr>
    <div class="tareascontainer">
        @foreach ($tareas as $tarea)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$tarea->titulo}}</h5>
                    <h5 class="card-text">{{$tarea->descripcion}}</h5>
                    <h6 class="card-text">{{$tarea->fecha_finalizacion}}</h6>
                    <h6 class="card-text">{{$tarea->estado}}</h6>
                    <a href="{{ route('tareas.edit', ['id' => $tarea->id]) }}" class="btn btn-primary">editar</a>
                    <form action="{{ route('tareas.destroy', ['id' => $tarea->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
                    
@endsection