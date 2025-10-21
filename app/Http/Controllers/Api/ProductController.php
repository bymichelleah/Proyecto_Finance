<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductoRequest;
use App\Models\Productos;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Método listar
     */
    public function index()
    {
        /*$productos = Productos::all();
        return response()->json($productos);*/

        $productos = Productos::all(); // Trae todos los productos
        return view('productos.index', compact('productos'));
    }

    /**
     * Método crear
     */
    public function create()
    {
        return view('productos.crear');
    }

    public function store(ProductoRequest $request)
    {
        $producto = Productos::create($request->validated());
        /*return response()->json([
            'message' => 'Producto creado correctamente',
            'data' => $producto
        ], 201);*/
        return redirect()
            ->route('productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Mostrar un solo registro por du ID.
     */
    public function show(string $id)
    {
        $producto = Productos::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    /**
     * Modifica un registro existente
     */

    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        return view('productos.editar', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validated = $request->validate([
            'producto' => 'required|string|max:255',
            'tipo' => 'required',
            'tasa_interes' => 'nullable|numeric',
            'plazo_meses' => 'nullable|integer',
            'monto_minimo' => 'nullable|numeric',
            'monto_maximo' => 'nullable|numeric',
            'estado' => 'required|in:activo,inactivo',
            'descripcion' => 'nullable|string',
        ]);

        $producto->update($validated);
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
        /*return response()->json(['message' => 'Producto actualizado correctamente', 'data' => $producto]);*/
    }


    /**
     * Elimina un registro existente
     */
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);

        /*if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }*/

        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        /*return response()->json(['message' => 'Producto eliminado correctamente']);*/
    }
}
