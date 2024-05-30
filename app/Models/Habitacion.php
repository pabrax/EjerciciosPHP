<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero_habitacion',
        'tipo_habitacion',
        'descripcion',
        'precio',
        'capacidad',
        'estado'
    ];
}
