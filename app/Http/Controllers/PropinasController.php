<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropinasController extends Controller
{
    public function index()
    {
        return view('propinas');
    }

    //calcular propina
    public function calcular(Request $request)
    {
        $monto = $request->monto;
        $porcentaje = $request->porcentaje;
        $propina = $monto * $porcentaje / 100;
        return view('propinas', compact('propina'));
    }
}
