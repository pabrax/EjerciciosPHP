@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('habitaciones.update', $habitacion->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$habitacion->nombre}}" required>
        </div>

        <div class="form-group mb-4">
            <label for="numero_habitacion">Número de habitación</label>
            <input type="text" class="form-control" id="numero_habitacion" name="numero_habitacion" value="{{$habitacion->numero_habitacion}}" required>
        </div>

        <div class="form-group mb-4">
            <label for="tipo_habitacion">Tipo de habitación</label>
            <select class="form-control" id="tipo_habitacion" name="tipo_habitacion" required>
            <option value="simple" @if($habitacion->tipo_habitacion == 'simple') selected @endif>Simple</option>
            <option value="doble" @if($habitacion->tipo_habitacion == 'doble') selected @endif>Doble</option>
            <option value="triple" @if($habitacion->tipo_habitacion == 'triple') selected @endif>Triple</option>
            </select>
        </div>

        <div class="form-group mb-4">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{$habitacion->descripcion}}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{$habitacion->precio}}" required>
        </div>

        <div class="form-group mb-4">
            <label for="capacidad">Capacidad</label>
            <input type="text" class="form-control" id="capacidad" name="capacidad" value="{{$habitacion->capacidad}}" required>
        </div>

        <div class="form-group mb-4">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="disponible" @if($habitacion->estado == 'disponible') selected @endif>Disponible</option>
                <option value="reservada" @if($habitacion->estado == 'reservada') selected @endif>Reservada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
@endsection