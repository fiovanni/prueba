<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\FutbolController;

Route::post('futbol/register', [FutbolController::class, 'register']);
Route::post('futbol/login', [FutbolController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('futbol/user-profile', [FutbolController::class, 'userProfile']);
    Route::get('futbol/logout', [FutbolController::class, 'logout']);
});

// comprueba token para pasar
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
