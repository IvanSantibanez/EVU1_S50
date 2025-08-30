<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/login', [AuthController::class, 'loginWeb'])->name('login');
Route::post('/register', [AuthController::class, 'registerWeb']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth.jwt')->group(function () {
    Route::get('/proyectos', [ProyectoController::class, 'getProyectos'])->name('proyectos');
    Route::get('/proyecto/{id}', [ProyectoController::class, 'getProyecto'])->name('proyectos.show');
    Route::get('/proyectos/crear', [ProyectoController::class, 'getVistaCrearProyecto'])->name('proyectos.create');
    Route::post('/proyecto', [ProyectoController::class, 'postProyecto'])->name('proyectos.store');
    Route::get('/proyecto/{id}/editar', [ProyectoController::class, 'getVistaEditarProyecto'])->name('proyectos.edit');
    Route::put('/proyecto/{id}/editar', [ProyectoController::class, 'putProyecto'])->name('proyectos.update');

    Route::delete('/proyecto/{id}', [ProyectoController::class, 'deleteProyecto'])->name('proyectos.destroy');
});
