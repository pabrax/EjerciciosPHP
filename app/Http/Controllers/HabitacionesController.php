<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habitacion;

class HabitacionesController extends Controller
{
    public function index()
    {
        $habitaciones = Habitacion::all();

        return view('habitaciones', compact('habitaciones'));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'nombre' => 'required',
            'numero_habitacion' => 'required',
            'tipo_habitacion' => 'required|in:simple,doble,triple',
            'descripcion' => 'required',
            'precio' => 'required',
            'capacidad' => 'required',
            'estado' => 'required|in:disponible,reservada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('habitaciones')
                ->withErrors($validator)
                ->withInput();
        }

        Habitacion::create($request->all());

        return redirect()->route('habitaciones');
    }

    public function destroy($id)
    {
        Habitacion::destroy($id);

        return redirect()->route('habitaciones');
    }

    public function edit($id)
    {
        $habitacion = Habitacion::find($id);

        return view('habitaciones.habitacion_edit', compact('habitacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'numero_habitacion' => 'required',
            'tipo_habitacion' => 'required|in:simple,doble,triple',
            'descripcion' => 'required',
            'precio' => 'required',
            'capacidad' => 'required',
            'estado' => 'required|in:disponible,reservada',
        ]);

        $habitacion = Habitacion::find($id);
        $habitacion->update($request->all());

        return redirect()->route('habitaciones');
    }

    public function create()
    {
        return view('habitaciones.habitacion_create');
    }
}
