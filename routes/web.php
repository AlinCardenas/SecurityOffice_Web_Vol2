<?php

use App\Http\Controllers\AccesosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BonoController;
use App\Http\Controllers\entradasSalidasController;
use App\Http\Controllers\faltasController;
use App\Http\Controllers\BonosController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\InasistenciaController;
use App\Http\Controllers\listaUsuariosController;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\TiposBonoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;
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


Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('inicio');
    
});


//Rutas solo views
// Route::get('/listaUsuarios', listaUsuariosController::class);

Route::get('/monitoreo', MonitoreoController::class);
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

// Tipos de bonos
Route::get('/tipos-bonos', [TiposBonoController::class, 'index'])->name('tipos-bonos.index');
Route::get('/tipos-bonos/create', [TiposBonoController::class, 'create'])->name('tipos-bonos.create');
Route::post('/tipos-bonos/tp', [TiposBonoController::class, 'store'])->name('tipos-bonos.store');
Route::post('/tipos-bonos/{id}', [TiposBonoController::class, 'show'])->name('tipos-bonos.show');
Route::get('/tipos-bonos/edit/{id}', [TiposBonoController::class, 'edit'])->name('tipos-bonos.edit');
Route::put('/tipos-bonos/{tipos-bono}', [TiposBonoController::class, 'update'])->name('tipos-bonos.update');
Route::delete('/tipos-bonos/{id}', [TiposBonoController::class, 'destroy'])->name('tipos-bonos.destroy');

// Enlaces a secciones de menu
Route::resource('/bonos', BonoController::class);
Route::resource('/puestos', PuestoController::class);
Route::resource('/turnos', TurnoController::class);


Route::prefix('auth')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('loginVerify', [AuthController::class, 'loginVerify'])->name('loginVerify.store');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('/registerVerify', [AuthController::class, 'registerVerify'])->name('registerVerify.store');
    Route::post('logOut', [AuthController::class, 'logOut'])->name('logOut');
});


//Rutas graficos
Route::get('/welcome', [GraficosController::class, 'welcome'])->name('welcome');
Route::get('/faltas', [GraficosController::class, 'faltas'])->name('faltas');
Route::get('/entradasSalidas', [GraficosController::class, 'entradasSalidas'])->name('entradasSalidas');
Route::get('/temperatura', [GraficosController::class, 'temperatura'])->name('temperatura');
Route::get('/voltaje', [GraficosController::class, 'voltaje'])->name('voltaje');

// Rutas de vista usuario
Route::get('/usuario/asistencias', [UserViewController::class, 'asistencias'])->name('userV.asistencia');
Route::get('/usuario/inasistencias', [UserViewController::class, 'inasistencias'])->name('user.inasistencias');
Route::get('/usuario/mbonos', [UserViewController::class, 'mbonos'])->name('user.mbonos');
Route::get('/usuario/bonos', [UserViewController::class, 'bonos'])->name('user.bonos');

// Pertinente al perfil
Route::get('/usuario/profile', [EditProfileController::class, 'index'])->name('edit.profile');