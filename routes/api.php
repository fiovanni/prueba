<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FutbolController;

// Auth
Route::post('futbol/register', [AuthController::class, 'register']);
Route::post('futbol/login', [AuthController::class, 'login']);

// Sanctum
Route::group(['middleware' => ['auth:sanctum']], function(){
    // Auth
    Route::get('futbol/user-profile', [AuthController::class, 'userProfile']);
    Route::get('futbol/logout', [AuthController::class, 'logout']);
    
    // Futbol
    Route::get('futbol/clubes', [FutbolController::class, 'clubes']); // Listado de Clubes
    Route::get('futbol/jugadores', [FutbolController::class, 'jugadores']); // Listado de Jugadores
    Route::post('futbol/jugadores', [FutbolController::class, 'crearJugador']); // Crear Jugador
    Route::put('futbol/jugadores/{id}', [FutbolController::class, 'editarJugador']); // Editar Jugador
    Route::patch('futbol/jugadores/{id}', [FutbolController::class, 'borrarJugador']); // Borrar Jugador
    Route::get('futbol/historiales', [FutbolController::class, 'historialesJugadores']); // Historial de Jugadores    
});

// user autenticado //pasar token
// Route::middleware('auth:sanctum')->get('futbol/user', function (Request $request) {
//     return $request->user();
// });