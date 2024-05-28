@extends('layouts.app') 

@section('content')
<div class="container my-4 p-4 bg-light border rounded">
    <form action="{{route('notas.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    
        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection