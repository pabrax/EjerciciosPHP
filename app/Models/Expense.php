<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // descripcion/nombre, monto. categoria, fecha

    protected $fillable = ['description', 'amount', 'category', 'date', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
