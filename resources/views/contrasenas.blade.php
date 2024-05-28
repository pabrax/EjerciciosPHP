@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>Contraseñas</h1>
        <div class="row">
            <div>
                <form action="{{route('contrasenas.calcular')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="longitud">Longitud</label>
                        <input type="number" class="form-control" id="longitud" name="longitud" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @if(isset($contrasena))
                        <h3>La contraseña es: {{ $contrasena }}</h3>
                    @else
                        <h3>La contraseña es: </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection