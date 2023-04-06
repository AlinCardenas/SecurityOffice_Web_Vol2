<?php

use App\Http\Controllers\AccesosController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AsisInasisController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BonoController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\EntradasSalidaController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\MonitoreoController;
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
userV.asistencia
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Asistencias e inasistencias
Route::middleware('auth')->group(function() {
    Route::get('/', [AsisInasisController::class, 'asistencias'])->name('inicio');
});

//Rutas solo views
// Route::get('/listaUsuarios', listaUsuariosController::class);

Route::get('/faltas-registros', [AsisInasisController::class, 'inasistencias'])->name('faltas.registros');
Route::get('/monitoreo', MonitoreoController::class);
Route::get('/entradasSalidas', AccesosController::class);

// AREAS
Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
//? Buscar
Route::get('/ver_areas', [AreaController::class, 'indexes'])->name('ver_areas');
Route::get('/ver_areas_normal', [AreaController::class, 'normal'])->name('ver_areas_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/areas/create', [AreaController::class, 'create'])->name('areas.create');
Route::post('/areas/area', [AreaController::class, 'store'])->name('areas.store');
Route::post('/areas/{id}', [AreaController::class, 'show'])->name('areas.show');
Route::get('/areas/edit/{id}', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{area}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{id}', [AreaController::class, 'destroy'])->name('areas.destroy');

// Entradas salidas
Route::get('/entradas-salidas', [EntradasSalidaController::class, 'index'])->name('entradas.index');
//? Buscar
Route::get('/ver_ensa', [EntradasSalidaController::class, 'indexes'])->name('ver_ensa');
Route::get('/ver_ensa_normal', [EntradasSalidaController::class, 'normal'])->name('ver_ensa_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/entradas-salidas/create', [EntradasSalidaController::class, 'create'])->name('entradas.create');
Route::post('/entradas-salidas/area', [EntradasSalidaController::class, 'store'])->name('entradas.store');
Route::post('/entradas-salidas/{id}', [EntradasSalidaController::class, 'show'])->name('entradas.show');
Route::get('/entradas-salidas/edit/{id}', [EntradasSalidaController::class, 'edit'])->name('entradas.edit');
Route::put('/entradas-salidas/{id}', [EntradasSalidaController::class, 'update'])->name('entradas.update');
Route::delete('/entradas-salidas/{id}', [EntradasSalidaController::class, 'destroy'])->name('entradas.destroy');

//Usuarios
Route::get('/usuarios', [UserController::class, 'index'])->name('users.index');
//? Buscar
Route::get('/ver_usuarios', [UserController::class, 'indexes'])->name('ver_usuarios');
Route::get('/ver_normal', [UserController::class, 'normal'])->name('ver_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/usuarios/create', [UserController::class, 'create'])->name('users.create');
Route::post('/usuarios/usuario', [UserController::class, 'store'])->name('users.store');
Route::post('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/usuarios/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('users.destroy');

//Puestos
Route::get('/puestos', [PuestoController::class, 'index'])->name('users.index');
//? Buscar
Route::get('/ver_puesto', [PuestoController::class, 'indexes'])->name('ver_puesto');
Route::get('/ver_puesto_normal', [PuestoController::class, 'normal'])->name('ver_puesto_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/puestos/create', [PuestoController::class, 'create'])->name('users.create');
Route::post('/puestos/puesto', [PuestoController::class, 'store'])->name('users.store');
Route::post('/puestos/{id}', [PuestoController::class, 'show'])->name('users.show');
Route::get('/puestos/edit/{id}', [PuestoController::class, 'edit'])->name('users.edit');
Route::put('/puestos/{puesto}', [PuestoController::class, 'update'])->name('puestos.update');
Route::delete('/puestos/{id}', [PuestoController::class, 'destroy'])->name('users.destroy');


// // Tipos de bonos
// Route::get('/tipos-bonos', [TiposBonoController::class, 'index'])->name('tipos-bonos.index');
// Route::get('/tipos-bonos/create', [TiposBonoController::class, 'create'])->name('tipos-bonos.create');
// Route::post('/tipos-bonos/tp', [TiposBonoController::class, 'store'])->name('tipos-bonos.store');
// Route::post('/tipos-bonos/{id}', [TiposBonoController::class, 'show'])->name('tipos-bonos.show');
// Route::get('/tipos-bonos/edit/{id}', [TiposBonoController::class, 'edit'])->name('tipos-bonos.edit');
// Route::put('/tipos-bonos/{id}', [TiposBonoController::class, 'update'])->name('tipos-bonos.update');
// Route::delete('/tipos-bonos/{id}', [TiposBonoController::class, 'destroy'])->name('tipos-bonos.destroy');

// Bonos
Route::get('/bonos', [BonoController::class, 'index'])->name('bonos.index');
//? Buscar
Route::get('/ver_bonos', [BonoController::class, 'indexes'])->name('ver_bonos');
Route::get('/ver_bonos_normal', [BonoController::class, 'normal'])->name('ver_bonos_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/bonos/create', [BonoController::class, 'create'])->name('bonos.create');
Route::post('/bonos/bono', [BonoController::class, 'store'])->name('bonos.store');
Route::post('/bonos/{id}', [BonoController::class, 'show'])->name('bonos.show');
Route::get('/bonos/edit/{id}', [BonoController::class, 'edit'])->name('bonos.edit');
Route::put('/bonos/{id}', [BonoController::class, 'update'])->name('bonos.update');
Route::delete('/bonos/{id}', [BonoController::class, 'destroy'])->name('bonos.destroy');


// Turnos
Route::get('/turnos', [TurnoController::class, 'index'])->name('turnos.index');
//? Buscar
Route::get('/ver_turnos', [TurnoController::class, 'indexes'])->name('ver_turnos');
Route::get('/ver_turnos_normal', [TurnoController::class, 'normal'])->name('ver_turnos_normal');
//??????????????????????????????????????????????????????????????????????????????????????????
Route::get('/turnos/create', [TurnoController::class, 'create'])->name('turnos.create');
Route::post('/turnos/turno', [TurnoController::class, 'store'])->name('turnos.store');
Route::post('/turnos/{id}', [TurnoController::class, 'show'])->name('turnos.show');
Route::get('/turnos/edit/{id}', [TurnoController::class, 'edit'])->name('turnos.edit');
Route::put('/turnos/{id}', [TurnoController::class, 'update'])->name('turnos.update');
Route::delete('/turnos/{id}', [TurnoController::class, 'destroy'])->name('turnos.destroy');



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
Route::get('/usuario/profile/{id}', [EditProfileController::class, 'index'])->name('edit.profile'); 
Route::put('/usuarios/profile/{user}', [EditProfileController::class, 'update'])->name('editusers.update');

