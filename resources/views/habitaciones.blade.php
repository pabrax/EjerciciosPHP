@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Habitaciones</h1>
        <div>
            <a href="{{ route('habitaciones.create') }}" class="btn btn-primary">Nueva Habitación</a>
        </div>
    </div>
    <hr>
    <div class="habitacionescontainer">
        @foreach ($habitaciones as $habitacion)
            <div class="card">
                <div class="card-body">
                    
                    <h5 class="card-title text-uppercase">{{$habitacion->nombre}}</h5>
                    
                    <p class="card-text">Número de habitación: {{$habitacion->numero_habitacion}}</p>
                    
                    
                    <p class="card-text">Tipo de habitación: {{$habitacion->tipo_habitacion}}</p>
                    
                    <p class="card-text">Descripción: {{$habitacion->descripcion}}</p>
                    
                    <p class="card-text">Precio: {{$habitacion->precio}}</p>

                    <p class="card-text">Capacidad: {{$habitacion->capacidad}}</p>

                    @if ($habitacion->estado == 'reservada')
                        <p class="text-danger">Estado: {{$habitacion->estado}}</p>
                    @else
                        <p class="text-success">Estado: {{$habitacion->estado}}</p>
                    @endif

                    <a href="{{ route('habitaciones.edit', ['id' => $habitacion->id]) }}" class="btn btn-primary">editar</a>

                    <form action="{{ route('habitaciones.destroy', ['id' => $habitacion->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>

                    <a href="{{ route('reservas.create', ['habitacion_id' => $habitacion->id]) }}" class="btn btn-primary">Reservar</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection