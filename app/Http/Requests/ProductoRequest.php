<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // permitir siempre
    }

    public function rules(): array
    {
        return [
            'producto' => 'required|string|max:255',
            'tipo' => 'required',
            'tasa_interes' => 'nullable|numeric',
            'plazo_meses' => 'nullable|integer',
            'monto_minimo' => 'nullable|numeric',
            'monto_maximo' => 'nullable|numeric',
            'estado' => 'required|in:activo,inactivo',
            'descripcion' => 'nullable|string',
        ];
    }
}

