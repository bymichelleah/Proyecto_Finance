<?php

use Illuminate\Support\Facades\Route;
//Pagos
use App\Http\Controllers\PagoController;

Route::get('/', function () {
    return view('welcome');
});
//Rutas de Pagos
Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('/pagos/{id}', [PagoController::class, 'show'])->name('pagos.show');
Route::get('/pagos/{id}/pdf', [PagoController::class, 'descargarPDF'])->name('pagos.pdf');

