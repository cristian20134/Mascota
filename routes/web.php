<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
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

Route::get('/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/store', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuario.store');
Route::get('/usuario/index', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuario.home');

Route::get('/raza/create', [App\Http\Controllers\RazaController::class, 'create'])->name('raza.create');
Route::post('/raza/store', [App\Http\Controllers\RazaController::class, 'store'])->name('raza.store');
Route::get('/raza/edit/{id}', [App\Http\Controllers\RazaController::class, 'edit'])->name('raza.edit');
Route::put('/raza/update/{id}', [App\Http\Controllers\RazaController::class, 'update'])->name('raza.update');

Route::get('/historial/create', [App\Http\Controllers\HistorialMedicoController::class, 'create'])->name('historial.create');
Route::post('/historial/store', [App\Http\Controllers\HistorialMedicoController::class, 'store'])->name('historial.store');

Route::get('/tamano/create', [App\Http\Controllers\TamanoController::class, 'create'])->name('tamano.create');
Route::post('/tamano/store', [App\Http\Controllers\TamanoController::class, 'store'])->name('tamano.store');
Route::get('/tamano/edit/{id}', [App\Http\Controllers\TamanoController::class, 'edit'])->name('tamano.edit');
Route::put('/tamano/update/{id}', [App\Http\Controllers\TamanoController::class, 'update'])->name('tamano.update');

Route::get('/genero/create', [App\Http\Controllers\GeneroController::class, 'create'])->name('genero.create');
Route::post('/genero/store', [App\Http\Controllers\GeneroController::class, 'store'])->name('genero.store');
Route::get('/genero/edit/{id}', [App\Http\Controllers\GeneroController::class, 'edit'])->name('genero.edit');
Route::put('/genero/update/{id}', [App\Http\Controllers\GeneroController::class, 'update'])->name('genero.update');

Route::get('/personalidad/create', [App\Http\Controllers\PersonalidadController::class, 'create'])->name('personalidad.create');
Route::post('/personalidad/store', [App\Http\Controllers\PersonalidadController::class, 'store'])->name('personalidad.store');
Route::get('/personalidad/edit/{id}', [App\Http\Controllers\PersonalidadController::class, 'edit'])->name('personalidad.edit');
Route::put('/personalidad/update/{id}', [App\Http\Controllers\PersonalidadController::class, 'update'])->name('personalidad.update');