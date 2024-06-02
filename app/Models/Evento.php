<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // datos para la tabla de eventos, debe tener: titulo, descripcion, fecha
    protected $fillable = ['title', 'description', 'start_date', 'end_date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
