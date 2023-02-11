<?php

use App\Http\Controllers\entradasSalidasController;
use App\Http\Controllers\faltasController;
use App\Http\Controllers\BonosController;
use App\Http\Controllers\listaUsuariosController;
use App\Http\Controllers\monitoreoController;
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
Route::get('/monitoreo', monitoreoController::class);
Route::get('/listaUsuarios', listaUsuariosController::class);
Route::get('/faltas', faltasController::class);
Route::get('/entradasSalidas', entradasSalidasController::class);

//Rutas crudBonos
Route::get('/crudBonos', [BonosController::class,'index']);
Route::get('/crudBonos/create', [BonosController::class,'create']);













