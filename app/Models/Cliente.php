<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; 
    
    protected $fillable = [
        'nombre',
        'apellido',
        'n_documento',
        'telefono',
        'correo_electronico',
        'ocupacion',
        'provincia',
        'distrito',
        'direccion',
        'producto_adquirido_id',
        'estado',
    ];
}
