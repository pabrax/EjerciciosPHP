<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contrasenasController extends Controller
{
    public function index()
    {
        return view('contrasenas');
    }

    //calcular contraeñas seguras
    public function calcular(Request $request)
    {
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890.,;:-_{}[]()=+*^%$#@!¡?¿";
        $longitud = $request->longitud;

        $contrasena = substr(str_shuffle($caracteres), 0, $longitud);

        return view('contrasenas', compact('contrasena'));
    }
}
