<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function () {
    Route::get('/proyectos', [ProyectoController::class, 'getProyectos']);
    Route::get('/proyecto/{id}', [ProyectoController::class, 'getProyecto']);
    Route::post('/proyecto', [ProyectoController::class, 'postProyecto']);
    Route::delete('/proyecto/{id}', [ProyectoController::class, 'deleteProyecto']);
    Route::put('/proyecto/{id}', [ProyectoController::class, 'putProyecto']);
    Route::get('/uf', [UfController::class, 'getUf']);
});
