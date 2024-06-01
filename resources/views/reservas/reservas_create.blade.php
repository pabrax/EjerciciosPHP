@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservar Habitación</h1>
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="habitacion_id" value="{{ $habitacion->id }}">
        
        <div class="form-group">
            <label for="fecha_entrada">Fecha de Entrada</label>
            <input type="date" name="fecha_entrada" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fecha_salida">Fecha de Salida</label>
            <input type="date" name="fecha_salida" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="pendiente" hidden selected>Pendiente</option>
                <option value="confirmada">Confirmada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
</div>

@endsection

