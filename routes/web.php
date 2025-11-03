<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*Route::view('/productos', 'productos.index');*/
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}/editar', [ProductController::class, 'edit'])->name('productos.editar');
Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos', [ProductController::class, 'store'])->name('productos.store');
Route::get('/productos/crear', [ProductController::class, 'create'])->name('productos.create');

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/{id}/editar', [ClienteController::class, 'edit'])->name('clientes.editar');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/crear', [ClienteController::class, 'create'])->name('clientes.create');

Route::resource('clientes', ClienteController::class);