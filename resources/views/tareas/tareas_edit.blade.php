@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('tareas.update', $tarea->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{$tarea->titulo}}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$tarea->descripcion}}" required>
        </div>
        
        <div class="form-group">
            <label for="fecha_finalizacion">fecha de finalizacion</label>
            <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" value="{{$tarea->fecha_finalizacion}}" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="completada" @if($tarea->estado == 'completada') selected @endif>Completada</option>
                <option value="no_completada" @if($tarea->estado == 'no_completada') selected @endif>No Completada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection