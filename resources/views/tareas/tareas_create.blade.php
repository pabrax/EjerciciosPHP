@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('tareas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group">
            <label for="fecha_finalizacion">fecha de finalizacion</label>
            <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="completada">Completada</option>
                <option value="no_completada">No Completada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
@endsection