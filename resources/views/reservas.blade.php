@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Reservas</h1>
        <div>
            <a href="{{ route('habitaciones') }}" class="btn btn-primary">ver habitaciones</a>
        </div>
    </div>
    <hr>
    <div class="reservascontainer">
        @foreach ($reservas as $reserva)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$reserva->habitacion->nombre}}</h5>
                    <p class="card-text">Fecha de Entrada: {{$reserva->fecha_entrada}}</p>
                    <p class="card-text">Fecha de Salida: {{$reserva->fecha_salida}}</p>
                    <p class="card-text">Estado: {{$reserva->estado}}</p>
                    <p class="card-text">Total: {{$reserva->total}}</p>

                    <a href="{{ route('reservas.edit', ['id' => $reserva->id]) }}" class="btn btn-primary">editar</a>

                    <form action="{{ route('reservas.destroy', ['id' => $reserva->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">cancelar</button>

                    </form>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection