<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/about_us', function () {
    return view('about_us');
});

Route::get('/politicas-privacidad', function () {
    return view('politicas-privacidad');
});

// CRUD rutas
Route::resource('productos', ProductoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('proveedores', ProveedorController::class)->parameters([
    'proveedores' => 'proveedor'
]);

Route::resource('pedidos', PedidoController::class);
Route::resource('ventas', VentaController::class);
Route::get('ventas/{venta}/pdf', [VentaController::class, 'pdf'])->name('ventas.pdf');
Route::get('reportes/inventario', [ReporteController::class, 'inventario'])->name('reportes.inventario');
Route::get('reportes/rendimiento', [ReporteController::class, 'rendimiento'])->name('reportes.rendimiento');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


