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

// Ejemplo
Route::get('/ejemplo', PruebaController::class);


//Rutas CRUDS
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::get('/usuarios/usuario', [UserController::class, 'store'])->name('users.store');
Route::get('/usuarios/edit/{id}', [UserController::class, 'edit']);
Route::get('/usuarios/show/{id}', [UserController::class, 'show']);


Route::resource('/bonos', BonoController::class);
Route::resource('/puestos', PuestoController::class);
Route::resource('/turnos', TurnoController::class);













