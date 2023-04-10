<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BonosApiController;
use App\Http\Controllers\PuestosApiController;
use App\Http\Controllers\SuperApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//? API PARA LOGIN
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [SuperApiController::class, 'login']);
    Route::post('signup', [SuperApiController::class, 'signup']);
    
    // Rutas que requieren que el usuario tenga un token válido
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', [SuperApiController::class, 'logout']);
        Route::get('user', [SuperApiController::class, 'user']);
        // Rutas de la API.
        //******************* */
    });
});

// API

//? Empleados con asistencia hoy
Route::get('/asistencias', [ApiController::class, 'asistencias']);

//? Todos los registros de entradas y salidas de hoy
Route::get('/registros', [ApiController::class,'registros']);

//? Empleados con inasistencias hoy
Route::get('/inasistencias', [ApiController::class, 'inasistencias']);

//? Empleados con bono hoy
Route::get('/empleadobono', [ApiController::class, 'empleadobono']);

//? Listado de bonos
Route::get('/bonos', [ApiController::class, 'bonos']);

//? Voltaje y temperatura
Route::get('/voltem', [ApiController::class, 'voltem']);

//? Listado de usuarios
Route::get('/getusers', [ApiController::class, 'getUsers']);

//? Listado de puestos
Route::get('/getpuestos', [ApiController::class, 'getPuestos']);

//? Listado de bonos
Route::get('/getbonos', [ApiController::class, 'getBonos']);

//?????????????????????????????????????????????????????????????????????????????
//? CRUD USUARIO
Route::post('/usuario', [UserApiController::class, 'store']);
Route::put('/usuarios/{id}', [UserApiController::class, 'update']);
Route::delete('/usuarios/{id}', [UserApiController::class, 'destroy']);

//? CRUD BONOS
Route::post('/bonos', [BonosApiController::class, 'store']);
Route::put('/bonos/{id}', [BonosApiController::class, 'update']);
Route::delete('/bonos/{id}', [BonosApiController::class, 'destroy']);

//? CRUD PUESTOS
Route::post('/puestos', [PuestosApiController::class, 'store']);
Route::put('/puestos/{id}', [PuestosApiController::class, 'update']);
Route::delete('/puestos/{id}', [PuestosApiController::class, 'destroy']);

//?????????????????????????????????????????????????????????????????????????????

//? Mis asistencias
Route::get('/misentradas', [SuperApiController::class, 'registrosEntradas']);
Route::get('/misbonos', [SuperApiController::class, 'registrosBonos']);