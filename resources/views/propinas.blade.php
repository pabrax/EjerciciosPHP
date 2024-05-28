@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>Propinas</h1>
        <div class="row">
            <div>
                <form action="{{route('propinas.calcular')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="number" class="form-control" id="monto" name="monto" required>
                    </div>
                    <div class="form-group row">
                        <label for="porcentaje" class="col-sm-2 col-form-label">Porcentaje</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="porcentaje" name="porcentaje" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="propina" class="col-sm-2 col-form-label">Propina</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="propina" name="propina" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>
            </div>

            <div class="col-md-6">
                @if(isset($propina))
                    <h3>El resultado es: {{ $propina }}</h3>
                @else
                    <h3>El resultado es: 0</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection