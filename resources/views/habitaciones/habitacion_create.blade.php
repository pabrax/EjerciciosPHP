@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('habitaciones.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
    
        <div class="form-group">
            <label for="numero_habitacion">Número de habitación</label>
            <input type="text" class="form-control" id="numero_habitacion" name="numero_habitacion" required>
        </div>
    
        <div class="form-group mb-4">
            <label for="tipo_habitacion">Tipo de habitación</label>
            <select class="form-control" id="tipo_habitacion" name="tipo_habitacion" required>
            <option value="simple" selected>Simple</option>
            <option value="doble">Doble</option>
            <option value="triple">Triple</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" required>
        </div>

        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" id="capacidad" name="capacidad" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
            <option value="disponible" selected>Disponible</option>
            <option value="reservada">reservada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
@endsection