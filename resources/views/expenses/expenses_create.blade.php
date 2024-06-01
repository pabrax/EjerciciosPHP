@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('expenses.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
    
        <div class="form-group">
            <label for="amount">Monto</label>
            <input type="text" class="form-control" id="amount" name="amount" required>
        </div>
    
        <div class="form-group mb-4">
            <label for="category">Tipo de gasto</label>
            <select class="form-control" id="category" name="category" required>
            <option value="comida" selected>Comida</option>
            <option value="transporte">Transporte</option>
            <option value="alojamiento">Alojamiento</option>
            <option value="otros">Otros</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="date">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection