<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\AdopcionController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TamanoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\PersonalidadController;
use App\Http\Controllers\HistorialMedicoController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuario/index', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario.index');
Route::get('/usuario/show/{u}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/usuario/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/usuario/store', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/edit/{u}', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('usuario.edit');
Route::put('/usuario/update/{u}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuario.update');
Route::get('/usuario/delete/{u}', [App\Http\Controllers\UsuarioController::class, 'delete'])->name('usuario.delete');
Route::get('/usuario/restore/{u}', [App\Http\Controllers\UsuarioController::class, 'restore'])->name('usuario.restore');

Route::get('/mascota/index', [App\Http\Controllers\MascotaController::class, 'index'])->name('mascota.index');
Route::get('/mascota/show/{m}', [App\Http\Controllers\MascotaController::class, 'show'])->name('mascota.show');
Route::get('/mascota/create', [App\Http\Controllers\MascotaController::class, 'create'])->name('mascota.create');
Route::post('/mascota/store', [App\Http\Controllers\MascotaController::class, 'store'])->name('mascota.store');
Route::get('/mascota/edit/{m}', [App\Http\Controllers\MascotaController::class, 'edit'])->name('mascota.edit');
Route::put('/mascota/update/{m}', [App\Http\Controllers\MascotaController::class, 'update'])->name('mascota.update');
Route::get('/mascota/delete/{m}', [App\Http\Controllers\MascotaController::class, 'delete'])->name('mascota.delete');
Route::get('/mascota/restore/{m}', [App\Http\Controllers\MascotaController::class, 'restore'])->name('mascota.restore');

Route::get('/adopcion/index', [App\Http\Controllers\AdopcionController::class, 'index'])->name('adopcion.index');
Route::get('/adopcion/show/{info}', [App\Http\Controllers\AdopcionController::class, 'show'])->name('adopcion.show');
Route::get('/adopcion/create', [App\Http\Controllers\AdopcionController::class, 'create'])->name('adopcion.create');
Route::post('/adopcion/store', [App\Http\Controllers\AdopcionController::class, 'store'])->name('adopcion.store');
Route::get('/adopcion/edit/{info}', [App\Http\Controllers\AdopcionController::class, 'edit'])->name('adopcion.edit');
Route::put('/adopcion/update/{info}', [App\Http\Controllers\AdopcionController::class, 'update'])->name('adopcion.update');
Route::get('/adopcion/delete/{info}', [App\Http\Controllers\AdopcionController::class, 'delete'])->name('adopcion.delete');
Route::get('/adopcion/restore/{info}', [App\Http\Controllers\AdopcionController::class, 'restore'])->name('adopcion.restore');

Route::get('/seguimiento/index', [App\Http\Controllers\SeguimientoController::class, 'index'])->name('seguimiento.index');
Route::get('/seguimiento/show{seg}', [App\Http\Controllers\SeguimientoController::class, 'show'])->name('seguimiento.show');
Route::get('/seguimiento/create', [App\Http\Controllers\SeguimientoController::class, 'create'])->name('seguimiento.create');
Route::post('/seguimiento/store', [App\Http\Controllers\SeguimientoController::class, 'store'])->name('seguimiento.store');
Route::get('/seguimiento/edit/{seg}', [App\Http\Controllers\SeguimientoController::class, 'edit'])->name('seguimiento.edit');
Route::put('/seguimiento/update/{seg}', [App\Http\Controllers\SeguimientoController::class, 'update'])->name('seguimiento.update');
Route::get('/seguimiento/delete/{seg}', [App\Http\Controllers\SeguimientoController::class, 'delete'])->name('seguimiento.delete');
Route::get('/seguimiento/restore/{seg}', [App\Http\Controllers\SeguimientoController::class, 'restore'])->name('seguimiento.restore');

Route::get('/raza/create', [App\Http\Controllers\RazaController::class, 'create'])->name('raza.create');
Route::post('/raza/store', [App\Http\Controllers\RazaController::class, 'store'])->name('raza.store');
Route::get('/raza/edit/{id}', [App\Http\Controllers\RazaController::class, 'edit'])->name('raza.edit');
Route::put('/raza/update/{id}', [App\Http\Controllers\RazaController::class, 'update'])->name('raza.update');
Route::get('/raza/delete/{info}', [App\Http\Controllers\RazaController::class, 'delete'])->name('raza.delete');
Route::get('/raza/restore/{info}', [App\Http\Controllers\RazaController::class, 'restore'])->name('raza.restore');

Route::get('/historial/index', [App\Http\Controllers\HistorialMedicoController::class, 'index'])->name('historial.index');
Route::get('/historial/show{his}', [App\Http\Controllers\HistorialMedicoController::class, 'show'])->name('historial.show');
Route::get('/historial/create', [App\Http\Controllers\HistorialMedicoController::class, 'create'])->name('historial.create');
Route::post('/historial/store', [App\Http\Controllers\HistorialMedicoController::class, 'store'])->name('historial.store');
Route::get('/historial/edit/{his}', [App\Http\Controllers\HistorialMedicoController::class, 'edit'])->name('historial.edit');
Route::put('/historial/update/{his}', [App\Http\Controllers\HistorialMedicoController::class, 'update'])->name('historial.update');
Route::get('/historial/delete/{his}', [App\Http\Controllers\HistorialMedicoController::class, 'delete'])->name('historial.delete');
Route::get('/historial/restore/{his}', [App\Http\Controllers\HistorialMedicoController::class, 'restore'])->name('historial.restore');

Route::get('/tamano/create', [App\Http\Controllers\TamanoController::class, 'create'])->name('tamano.create');
Route::post('/tamano/store', [App\Http\Controllers\TamanoController::class, 'store'])->name('tamano.store');
Route::get('/tamano/edit/{id}', [App\Http\Controllers\TamanoController::class, 'edit'])->name('tamano.edit');
Route::put('/tamano/update/{id}', [App\Http\Controllers\TamanoController::class, 'update'])->name('tamano.update');
Route::get('/tamano/delete/{info}', [App\Http\Controllers\TamanoController::class, 'delete'])->name('tamano.delete');
Route::get('/tamano/restore/{info}', [App\Http\Controllers\TamanoController::class, 'restore'])->name('tamano.restore');

Route::get('/genero/create', [App\Http\Controllers\GeneroController::class, 'create'])->name('genero.create');
Route::post('/genero/store', [App\Http\Controllers\GeneroController::class, 'store'])->name('genero.store');
Route::get('/genero/edit/{id}', [App\Http\Controllers\GeneroController::class, 'edit'])->name('genero.edit');
Route::put('/genero/update/{id}', [App\Http\Controllers\GeneroController::class, 'update'])->name('genero.update');

Route::get('/personalidad/create', [App\Http\Controllers\PersonalidadController::class, 'create'])->name('personalidad.create');
Route::post('/personalidad/store', [App\Http\Controllers\PersonalidadController::class, 'store'])->name('personalidad.store');
Route::get('/personalidad/edit/{id}', [App\Http\Controllers\PersonalidadController::class, 'edit'])->name('personalidad.edit');
Route::put('/personalidad/update/{id}', [App\Http\Controllers\PersonalidadController::class, 'update'])->name('personalidad.update');