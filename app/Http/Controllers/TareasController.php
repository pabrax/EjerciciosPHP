<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;

class TareasController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas', compact('tareas'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_finalizacion' => 'required',
            'estado' => 'required | in:completada,no_completada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tareas.create')
                ->withErrors($validator)
                ->withInput();
        }

        $tarea = new Tarea();
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_finalizacion = $request->fecha_finalizacion;
        $tarea->estado = $request->estado;
        $tarea->user_id = auth()->id();
        $tarea->save();
        return redirect()->route('tareas');
    }

    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect()->route('tareas');
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas');
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_finalizacion' => 'required',
            'estado' => 'required | in:completada,no_completada',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tareas.edit', $tarea->id)
                ->withErrors($validator)
                ->withInput();
        }

        $tarea = Tarea::Where('id', $id)->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'estado' => $request->estado,
        ]);


        $tarea = Tarea::Where('id', $id)->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_finalizacion' => $request->fecha_finalizacion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('tareas');
    }

    public function edit($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            return redirect()->route('tareas');
        }

        return view('tareas.tareas_edit', compact('tarea'));
    }

    public function create()
    {
        return view('tareas.tareas_create');
    }
}
