<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'hora',
        'momento',
        'comentario_hora',
        'medicamento',
        'gramos',
        'cantidad',
        'enfermedad',
        'observaciones',
    ];
}
