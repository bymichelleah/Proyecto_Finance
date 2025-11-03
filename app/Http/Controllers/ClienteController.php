<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Productos; // Necesario para cargar los productos en 'create' y 'edit'
use App\Http\Requests\ClienteRequest; // Usaremos el Request único
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Método listar (index)
     * Muestra la lista de clientes.
     */
    public function index()
    {
        // Trae todos los clientes, ordenados por ID descendente
        $clientes = Cliente::all(); 
        
        // Muestra la vista 'clientes.index'
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Método crear (create)
     * Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        // Necesitas cargar los productos para el selector de 'producto_adquirido_id'
        $productos = Productos::where('estado', 'activo')->get(['id', 'producto', 'tipo']);

        // Muestra la vista 'clientes.create'
        return view('clientes.create', compact('productos'));
    }

    /**
     * Método almacenar (store)
     * Guarda el nuevo cliente en la base de datos.
     * Usamos ClienteRequest para la validación.
     */
    public function store(ClienteRequest $request)
    {
        // Crea el cliente usando los datos validados
        Cliente::create($request->validated());
        
        return redirect()
            ->route('clientes.index') // Redirige a la lista de clientes
            ->with('success', 'Cliente creado correctamente');
    }

    /**
     * Mostrar un solo registro por su ID (show).
     */
    public function show(string $id)
    {
        // Busca el cliente o falla
        $cliente = Cliente::findOrFail($id); 
        
        // Retorna una respuesta JSON (como en tu ejemplo de producto)
        return response()->json($cliente);
    }

    /**
     * Modifica un registro existente (edit)
     * Muestra el formulario de edición.
     */
    public function edit($id)
    {
        // Busca el cliente o falla
        $cliente = Cliente::findOrFail($id);
        
        // Necesitas cargar los productos para el selector de 'producto_adquirido_id'
        $productos = Productos::where('estado', 'activo')->get(['id', 'producto', 'tipo']);
        
        // Muestra la vista 'clientes.edit'
        return view('clientes.edit', compact('cliente', 'productos'));
    }

    /**
     * Método actualizar (update)
     * Aplica los cambios a un cliente existente.
     * Usamos ClienteRequest para la validación.
     */
    public function update(ClienteRequest $request, $id)
    {
        // Busca el cliente o falla
        $cliente = Cliente::findOrFail($id);

        // Aplica la actualización con los datos validados
        $cliente->update($request->validated());
        
        return redirect()
            ->route('clientes.index') // Redirige a la lista de clientes
            ->with('success', 'Cliente actualizado correctamente');
    }


    /**
     * Elimina un registro existente (destroy)
     */
    public function destroy($id)
    {
        // Busca el cliente o falla
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();
        
        return redirect()
            ->route('clientes.index') // Redirige a la lista de clientes
            ->with('success', 'Cliente eliminado correctamente');
    }
}