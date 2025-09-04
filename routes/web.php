<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyectoVistasController;
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
    Route::get('/proyectos', [ProyectoVistasController::class, 'getProyectos'])->name('proyectos');
    Route::get('/proyecto/{id}', [ProyectoVistasController::class, 'getProyecto'])->name('proyectos.show');
    Route::get('/proyectos/crear', [ProyectoVistasController::class, 'getVistaCrearProyecto'])->name('proyectos.create');
    Route::post('/proyecto', [ProyectoVistasController::class, 'postProyecto'])->name('proyectos.store');
    Route::get('/proyecto/{id}/editar', [ProyectoVistasController::class, 'getVistaEditarProyecto'])->name('proyectos.edit');
    Route::put('/proyecto/{id}/editar', [ProyectoVistasController::class, 'putProyecto'])->name('proyectos.update');

    Route::delete('/proyecto/{id}', [ProyectoVistasController::class, 'deleteProyecto'])->name('proyectos.destroy');
});
