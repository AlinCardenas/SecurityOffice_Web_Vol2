<?php

use App\Http\Controllers\AccesosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BonoController;
use App\Http\Controllers\entradasSalidasController;
use App\Http\Controllers\faltasController;
use App\Http\Controllers\BonosController;
use App\Http\Controllers\InasistenciaController;
use App\Http\Controllers\listaUsuariosController;
use App\Http\Controllers\monitoreoController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Rutas solo views
// Route::get('/listaUsuarios', listaUsuariosController::class);
Route::get('/monitoreo', monitoreoController::class);
Route::get('/faltas', InasistenciaController::class);
Route::get('/entradasSalidas', AccesosController::class);

// AREAS
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas/area', [AreaController::class, 'store'])->name('areas.store');
Route::post('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('/areas/edit/{id}', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{area}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

//Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios/usuario', [UserController::class, 'store'])->name('users.store');
Route::post('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/usuarios/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Puestos
Route::put('/puestos/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');

Route::get('/ejemplo', PruebaController::class);

Route::resource('/bonos', BonoController::class);
Route::resource('/puestos', PuestoController::class);
Route::resource('/turnos', TurnoController::class);













