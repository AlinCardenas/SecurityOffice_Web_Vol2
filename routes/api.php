<?php

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