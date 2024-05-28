<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Validator;

class NotasController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return view('notas', compact('notas'));
    }

    public function store(Request $request)
    {
        $nota = new Nota();
        $nota->title = $request->title;
        $nota->content = $request->content;
        $nota->user_id = auth()->id();
        $nota->save();
        return redirect()->route('notas');
    }

    public function destroy($id)
    {
        $nota = Nota::find($id);
        $nota->delete();
        return redirect()->route('notas');
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return redirect()->route('notas');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('notas.edit', $nota->id)
                ->withErrors($validator)
                ->withInput();
        }

        $nota = Nota::Where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notas');

    }    

    public function edit($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return redirect()->route('notas');
        }
        
        return view('notas.notas_edit', compact('nota'));
    }
    
    public function create()
    {
        return view('notas.notas_create');
    }
}
