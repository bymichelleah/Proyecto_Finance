<?php
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
//Pagos
use App\Http\Controllers\PagoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('auth/{provider}', [SocialiteController::class, 'redirect']);
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::post('/logout', [SocialiteController::class, 'destroy'])->name('logout');

/*Route::view('/productos', 'productos.index');*/
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}/editar', [ProductController::class, 'edit'])->name('productos.editar');
Route::put('/productos/{id}', [ProductController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos', [ProductController::class, 'store'])->name('productos.store');
Route::get('/productos/crear', [ProductController::class, 'create'])->name('productos.create');


Route::post('/login', function () {
    // Aquí simplemente redirige a productos
    return redirect('/productos');
});


Route::get('/reportes', function () {
    return view('reportes.reportes');
});
//Rutas de Pagos
Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('/pagos/{id}', [PagoController::class, 'show'])->name('pagos.show');
Route::get('/pagos/{id}/pdf', [PagoController::class, 'descargarPDF'])->name('pagos.pdf');
