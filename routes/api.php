<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SuperApiController;
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
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    
    // Rutas que requieren que el usuario tenga un token válido
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
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
