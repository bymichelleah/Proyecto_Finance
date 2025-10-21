<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    //
      use HasFactory;

    protected $fillable = [
        'codigo',
        'cliente',
        'producto',
        'tipo',
        'fecha_pago',
        'monto_minimo',
        'monto_maximo',
        'documento_pdf',
    ];

}
