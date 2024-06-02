@extends('layouts.app')

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('eventos.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Fecha de inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">Fecha de fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

@endsection