@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Gastos</h1>
        <div>
            <a href="{{ route('expenses.create') }}" class="btn btn-primary">agregar Gasto</a>
        </div>
    </div>
    <hr>
    <div class="reservascontainer rounded" style="background-color: #f8f9fa; padding: 10px;">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>categoria</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expenses as $expense)
                <tr>
                    <td>{{$expense->description}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$expense->category}}</td>
                    <td>{{$expense->date}}</td>

                    <td>
                        <a href="{{ route('expenses.edit', ['id' => $expense->id]) }}" class="btn btn-primary">editar</a>
                        <form action="{{ route('expenses.destroy', ['id' => $expense->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">eliminar</button>
                        </form>

                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Total</th>
                    <td>{{$expenses->sum('amount')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection