<?php

use App\Http\Controllers\ModulosController;
use App\Http\Controllers\Productos as ControllersProductos;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProductoDetalle;
use App\Http\Controllers\CarrucelController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\UsuariosContoller;
use App\Models\Usuarios;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RespaldoController;


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

Route::get('/', [App\Http\Controllers\CarrucelController::class, 'carrucel'])->name('inicio');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');



Route::get('/agregar-pregunta', function () {
    return view('admin.insertar_ayuda');
})->name('agregar-pregunta');

Route::get('/ayudaa', [App\Http\Controllers\AyudaController::class, 'adminayuda'])
    ->middleware('auth')
    ->name('ayudaa');

Route::post('/agregar-pregunta', [App\Http\Controllers\AyudaController::class, 'store'])->name('insertar.pregunta');
Route::put('/ayudaa/{idpregunta}', [App\Http\Controllers\AyudaController::class, 'update'])->name('ayuda.update');
Route::get('/ayudaa/{idpregunta}/edit', [App\Http\Controllers\AyudaController::class, 'edit'])->name('ayuda.edit');
Route::delete('/ayudaa/{idpregunta}', [App\Http\Controllers\AyudaController::class, 'destroy'])->name('destroy.ayuda');
Route::get('/ayuda', [App\Http\Controllers\AyudaController::class, 'ayudamostrar'])->name('ayuda');


Route::get('/registro-usuario', [App\Http\Controllers\UsuariosContoller::class, 'pregunta'])->name('registro');






Route::get('/iniciar',[App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('iniciar');

Route::post('/iniciar',[App\Http\Controllers\AuthController::class, 'login'])->name('iniciar.sesion');


Route::post('/registrar-usuario', [App\Http\Controllers\UsuariosContoller::class, 'store'])->name('registrar.usuario');

Route::view('/carrito', 'modulos.carrito')->name('carrito');

// Ruta para cargar el formulario de nueva cita
Route::get('/citas', function () {
    return view('modulos.citas');
})->name('citas');

// Ruta para procesar los datos del formulario y almacenar la nueva cita
Route::post('/citas', [App\Http\Controllers\CitasController::class, 'store'])->name('registro.citas');




Route::get('/nuevo-producto', function () {
    return view('admin.insertar_producto');
})->name('nuevo-producto');



// Ruta para procesar los datos del formulario y almacenar el nuevo producto
Route::post('/insertar-producto', [App\Http\Controllers\ProductoControllerAdmin::class, 'store'])->name('insertar.producto');

Route::get('/nuevo-servicio', function () {
    return view('admin.insertar_servicio');
})->name('nuevo-servicio');

// Ruta para procesar los datos del formulario y almacenar el nuevo producto
Route::post('/insertar-servicio', [App\Http\Controllers\ServiciosController::class, 'store'])->name('insertar.servicio');



// Route::get('/contacto', function () {
//     return view('modulos.comentarios');
// })->name('contacto');

Route::post('/contacto', [App\Http\Controllers\ContactoController::class, 'enviarCorreo'])->name('enviar');
//TERMINA RUTAS SOLO PARA RETORNAR VISTAR DE LOS MODULOS

//INICIA RUTAS SOLO PARA RETORNAR VISTAR DE LOS MODULOS METODO GET
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'productos'])->name('productos');
Route::get('/producto', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('productos.buscar');


Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'servicios'])->name('servicios');
Route::get('/productos/detalles/{idproducto}', [ProductoDetalle::class, 'detalles'])->name('detalles');
//TERMINA RUTAS SOLO PARA RETORNAR VISTAR DE LOS MODULOS METODO GET



// INICIA RUTAS PARA LA ADMINISTRACION
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/editarperfil', [App\Http\Controllers\PerfilController::class, 'perfil'])
    ->middleware('auth','verified')
    ->name('perfil');




Route::get('/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'adminsomos'])
    ->middleware('auth','verified')
    ->name('configuracion');

Route::put('/configuracion/{idconfiguracion}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('somos.update');
Route::get('/configuracion/{idconfiguracion}/edit', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('somos.edit');

Route::get('/somos', [App\Http\Controllers\ConfiguracionController::class, 'somos'])->name('somos');



Route::get('/products', [App\Http\Controllers\ProductoControllerAdmin::class, 'productos'])
    ->middleware('auth','verified')
    ->name('products');

Route::get('/citass', [App\Http\Controllers\CitasController::class, 'citas'])
    ->middleware('auth','verified')
    ->name('citass');

Route::get('/services', [App\Http\Controllers\ServiciosController::class, 'adminservicios'])
    ->middleware('auth','verified')
    ->name('services');

Route::put('/services/{idservicio}', [App\Http\Controllers\ServiciosController::class, 'update'])->name('servicios.update');

Route::get('/services/{idservicio}/edit', [App\Http\Controllers\ServiciosController::class, 'edit'])->name('servicios.edit');

Route::delete('/services/{idservicio}', [App\Http\Controllers\ServiciosController::class, 'destroy'])->name('destroy.servicios');

Route::get('/users', [App\Http\Controllers\UsuariosControllerAdmin::class, 'usuarios'])
    ->middleware('auth','verified')
    ->name('users');

Route::delete('/users/{idproducto}', [App\Http\Controllers\ProductoControllerAdmin::class, 'destroy'])->name('destroy.producto');

Route::put('/products/{idproducto}', [App\Http\Controllers\ProductoControllerAdmin::class, 'update'])->name('productos.update');

Route::get('/products/{idproducto}/edit', [App\Http\Controllers\ProductoControllerAdmin::class, 'edit'])->name('productos.edit');

Route::get('citas/obtener', [App\Http\Controllers\CitasController::class, 'obtener_citas'])->name('citas.obtener_citas');


Route::get('/agregar-imagen', function () {
    return view('admin.insertar_carrucel');
})->name('agregar-imagen');

Route::get('/carruceladmin', [App\Http\Controllers\CarrucelController::class, 'admincarrucel'])
    ->middleware('auth','verified')
    ->name('carruceladmin');

Route::post('/agregar-imagen', [App\Http\Controllers\CarrucelController::class, 'store'])->name('nueva-imagen');
Route::delete('/carruceladmin/{idimagen}', [App\Http\Controllers\CarrucelController::class, 'destroy'])->name('destroy.imagen');
Route::put('/carruceladmin/{idimagen}', [App\Http\Controllers\CarrucelController::class, 'update'])->name('imagen.update');
Route::get('/carruceladmin/{idimagen}/edit', [App\Http\Controllers\CarrucelController::class, 'edit'])->name('imagen.edit');

// TERMINA RUTAS PARA LA ADMINISTRACION




//RUTAS DE PROYECTO DE COMPAÑIAS (OMITIR)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('/iniciarsesion', ['App\Http\Controllers\Auth\LoginController', 'showLoginForm'])->name('iniciarsesion');

Route::post('/iniciarsesion', ['App\Http\Controllers\Auth\LoginController', 'login']);
// Route::post('/logout', ['App\Http\Controllers\Auth\LoginController', 'logout'])->name('logout');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('companies', CompanyController::class);

// Route::resource('usuarios', RegistroController::class);
// Route::get('/calendar',[App\Http\Controllers\CalendarController::class,'index'])->name('calendar');

// Route::post('/registro', [CuentasController::class, 'store']);

Route::get('/registerrr', 'RegisterController@showRegistrationForm');
Route::post('/registerrr', 'RegisterController@register')->name('registerrr');


//Respaldo de la base de datos
Route::get('/respaldo', [RespaldoController::class, 'index'])->name('respaldo');
Route::get('backup', [RespaldoController::class, 'backup'])->name('respaldo.backup');
Route::post('/restore-db', [RespaldoController::class, 'restore'])->name('restore-db');
Route::post('/eliminar-bd', [RespaldoController::class, 'eliminarBD'])->name('eliminar-bd');



// routes/web.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\EnfermeroController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Route::get('/admin', [App\Http\Controllers\Auth\AdminController::class, 'index'])->middleware(['auth', 'admin']);
// Route::get('/veterinario', [App\Http\Controllers\Auth\VeterinarioController::class, 'index'])->middleware(['auth', 'veterinario']);
// Route::get('/enfermero', [App\Http\Controllers\Auth\EnfermeroController::class, 'index'])->middleware(['auth', 'enfermero']);

// Muestra el formulario de correo electrónico para enviar el enlace de restablecimiento de contraseña
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Enviar el correo electrónico con el enlace de restablecimiento de contraseña
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Muestra el formulario para restablecer la contraseña
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

// Restablecer la contraseña
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
