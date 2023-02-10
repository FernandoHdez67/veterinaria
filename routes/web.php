<?php

use App\Http\Controllers\ModulosController;
use App\Http\Controllers\Productos as ControllersProductos;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','welcome')->name('inicio');
Route::view('/citas','modulos.citas')->name('citas');

// Route::view('/productos','modulos.productos')->name('productos');
// Route::get('/productos',[ModulosController::class,'productos'])->name('productos');

Route::view('/servicios','modulos.servicios')->name('servicios');
Route::view('/somos','modulos.somos')->name('somos');

Route::view('/iniciarsesion','sesiones.iniciarsesion')->name('iniciarsesion');
Route::view('/registro','sesiones.registro')->name('registro');


//Administracion
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/usuarios', function () {
    return view('admin.admin_usuarios');
})->middleware(['auth', 'verified'])->name('usuarios');

// Route::get('/products', function () {
//     return view('admin.admin_productos');
// })->middleware(['auth', 'verified'])->name('products');

Route::get('/configuracion', function () {
    return view('admin.admin_config');
})->middleware(['auth', 'verified'])->name('configuracion');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/products',[App\Http\Controllers\ProductoControllerAdmin::class,'productos'])->name('products');

Route::get('/productos',[App\Http\Controllers\ProductoController::class,'productos'])->name('productos');

Route::get('/detalleproducto',[App\Http\Controllers\ProductoDetalle::class,'productos'])->name('detalle');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::resource('companies', CompanyController::class);

// Route::resource('usuarios', RegistroController::class);
// Route::get('/calendar',[App\Http\Controllers\CalendarController::class,'index'])->name('calendar');

// Route::post('/registro', [CuentasController::class, 'store']);
