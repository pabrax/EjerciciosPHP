<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Habitacion;
use Illuminate\Support\Facades\Validator;

// use habitacionController;

class ReservasController extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();

        return view('reservas', compact('reservas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'habitacion_id' => 'required',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservas', ['habitacion_id' => $request->habitacion_id])
                ->withErrors($validator)
                ->withInput();
        }


        Reserva::create([
            'user_id' => auth()->id(),
            'habitacion_id' => $request->habitacion_id,
            'fecha_entrada' => $request->fecha_entrada,
            'fecha_salida' => $request->fecha_salida,
            'estado' => $request->estado,
            'total' => $request->total,
        ]);

        $habitacion = Habitacion::find($request->habitacion_id);
        $habitacion->estado = 'reservada';
        $habitacion->save();

        return redirect()->route('reservas');
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);



        if (!$reserva) {
            return redirect()->route('reservas');
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'habitacion_id' => 'required|exists:habitaciones,id',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
            'total' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservas.edit', $reserva->id)
                ->withErrors($validator)
                ->withInput();
        }

        $reserva->user_id = auth()->id();
        $reserva->habitacion_id = $request->habitacion_id;
        $reserva->fecha_entrada = $request->fecha_entrada;
        $reserva->fecha_salida = $request->fecha_salida;
        $reserva->estado = $request->estado;
        $reserva->total = $request->total;
        $reserva->save();

        $habitacion = Habitacion::find($request->habitacion_id);

        if ($request->estado == 'cancelada') {
            $habitacion->estado = 'disponible';
        } else {
            $habitacion->estado = 'reservada';
        }

        $habitacion->save();

        return redirect()->route('reservas');
    }

    public function destroy($id)
    {
        Reserva::destroy($id);

        return redirect()->route('reservas');
    }

    public function edit($id)
    {
        $reserva = Reserva::find($id);

        if (!$reserva) {
            return redirect()->route('reservas');
        }

        return view('reservas.reservas_edit', compact('reserva'));
    }

    public function create($habitacion_id)
    {
        $habitacion = Habitacion::find($habitacion_id);

        if (!$habitacion) {
            return redirect()->route('habitaciones');
        }

        return view('reservas.reservas_create', compact('habitacion'));
    }
}
