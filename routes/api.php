<?php

use App\Http\Controllers\Api\ProyectoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [AuthController::class, 'loginApi']);
Route::post('/register', [AuthController::class, 'registerApi']);
Route::get('/uf', [UfController::class, 'getUf']);

Route::middleware('auth.jwt')->group(function () {
    Route::apiResource('proyectos', ProyectoController::class);
});
