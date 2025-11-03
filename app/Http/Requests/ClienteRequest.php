<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'n_documento' => ['required', 'string', 'max:20', 'unique:clientes,n_documento'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'correo_electronico' => ['required', 'email', 'max:100', 'unique:clientes,correo_electronico'],
            'ocupacion' => ['nullable', 'string', 'max:100'],
            'provincia' => ['required', 'string', 'max:50'],
            'distrito' => ['required', 'string', 'max:50'],
            'direccion' => ['required', 'string', 'max:255'],
            'producto_adquirido_id' => ['nullable', 'integer', 'exists:productos,id'],
            'estado' => ['nullable', 'in:Activado,Inactivo,Pendiente'],
        ];
    }
}
