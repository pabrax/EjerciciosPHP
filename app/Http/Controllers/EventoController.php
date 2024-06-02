<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use DateTime;
use Illuminate\Support\Facades\Validator;

class EventoController extends Controller
{
    public function calendario()
    {
        $currentDate = new \DateTime();
        $year = $currentDate->format('Y');
        $month = $currentDate->format('m');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $startDay = (new \DateTime("$year-$month-01"))->format('w'); // 0 (Sunday) to 6 (Saturday)

        // Obtener eventos del usuario actual y agruparlos por fecha
        $eventos = Evento::where('user_id', auth()->id())
            ->whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->start_date)->format('Y-m-d');
            });

        return view('calendario', compact('year', 'month', 'daysInMonth', 'startDay', 'eventos'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('evento.create')
                ->withErrors($validator)
                ->withInput();
        }

        Evento::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('calendario');
    }

    public function edit($id)
    {

        $evento = Evento::find($id);
        return view('calendario.evento_edit', compact('evento'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::find($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('evento.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // update evento

        Evento::where('id', $id)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

        return redirect()->route('calendario');
    }

    //show 
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('calendario.evento_show', compact('evento'));
    }

    public function destroy($id)
    {

        $evento = Evento::find($id);
        $evento->delete();

        return redirect()->route('calendario');
    }

    public function create()
    {
        return view('calendario.evento_create');
    }
}
