@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Notas</h1>
        <div>
            <a href="{{ route('notas.create') }}" class="btn btn-primary">Nueva Nota</a>
        </div>
    </div>
    <hr>
    <div class="notascontainer">
        @foreach ($notas as $nota)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$nota->title}}</h5>
                    <p class="card-text">{{$nota->content}}</p>
                    <a href="{{ route('notas.edit', ['id' => $nota->id]) }}" class="btn btn-primary">editar</a>
                    <form action="{{ route('notas.destroy', ['id' => $nota->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">eliminar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection