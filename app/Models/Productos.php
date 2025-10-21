<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;

    protected $fillable = [
    'producto',
    'tipo',
    'tasa_interes',
    'plazo_meses',
    'monto_minimo',
    'monto_maximo',
    'estado',
    'descripcion',
];

}
