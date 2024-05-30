<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CronometroController extends Controller
{
    public function index()
    {
        return view('cronometro');
    }
}
