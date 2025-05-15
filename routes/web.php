<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AtrasoController;
use App\Http\Controllers\admin\exemploController;
use App\Http\Controllers\admin\FrequenciaController;
use App\Http\Controllers\admin\JustificativaFaltaController;
use App\Http\Controllers\admin\ProjectoController;
use App\Http\Controllers\admin\TarefaController;
use App\Http\Controllers\admin\TarefaUsuarioController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CategoriaTarefaController;
use App\Http\Controllers\admin\JustificativaAtrasoController;



Route::get('/', function () {
    return view('Site.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('Site.auth.register');
})->name('register');

Route::get('/index', [UserController::class, 'index'])->name('user.index');

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'all'])->name('user.all');
    Route::get('/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/{id}', [UserController::class, 'delete'])->name('user.delete');
});

Route::prefix('auth')->group(function () {
    Route::post('/login', ['as' => 'auth.login', 'uses' => "App\Http\Controllers\Auth\AuthController@login"]);
    Route::post('/register', ['as' => 'auth.register', 'uses' => "App\Http\Controllers\Auth\AuthController@register"]);
    Route::get('/logout', ['as' => 'auth.logout', 'uses' => "App\Http\Controllers\Auth\AuthController@logout"]);    
});

Route::prefix('frequencia')->group(function () {
    Route::get('/', [FrequenciaController::class, 'index'])->name('frequencia.index');
    Route::get('/create', [FrequenciaController::class, 'create'])->name('frequencia.create');
    Route::post('/', [FrequenciaController::class, 'store'])->name('frequencia.store');
    Route::get('/{id}', [FrequenciaController::class, 'show'])->name('frequencia.show');
    Route::get('/{id}/edit', [FrequenciaController::class, 'edit'])->name('frequencia.edit');
    Route::put('/{id}', [FrequenciaController::class, 'update'])->name('frequencia.update');
    Route::delete('/{id}', [FrequenciaController::class, 'destroy'])->name('frequencia.destroy');
});

Route::prefix('tarefa')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::get('/create', [TarefaController::class, 'create'])->name('tarefa.create');
    Route::get('/{id}/edit', [TarefaController::class, 'edit'])->name('tarefa.edit');
    Route::post('/', [TarefaController::class, 'store'])->name('tarefa.store');
    Route::get('/{id}', [TarefaController::class, 'show'])->name('tarefa.show');
    Route::put('/{id}', [TarefaController::class, 'update'])->name('tarefa.update');
    Route::delete('/{id}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
});

Route::prefix('tarefaUsuario')->group(function () {
    Route::get('/', [TarefaUsuarioController::class, 'index'])->name('tarefaUsuario.index');
    Route::get('/create', [TarefaUsuarioController::class, 'create'])->name('tarefaUsuario.create');
    Route::post('/', [TarefaUsuarioController::class, 'store'])->name('tarefaUsuario.store');
    Route::get('/{id}/edit', [TarefaUsuarioController::class, 'edit'])->name('tarefaUsuario.edit');
    Route::put('/{id}', [TarefaUsuarioController::class, 'update'])->name('tarefaUsuario.update');
    Route::delete('/{id}', [TarefaUsuarioController::class, 'destroy'])->name('tarefaUsuario.destroy');
});

Route::prefix('projecto')->group(function () {
    Route::get('/', [ProjectoController::class, 'index'])->name('projecto.index');
    Route::get('/create', [ProjectoController::class, 'create'])->name('projecto.create');
    Route::post('/', [ProjectoController::class, 'store'])->name('projecto.store');
    Route::get('/{id}', [ProjectoController::class, 'show'])->name('projecto.show');
    Route::get('/{id}/edit', [ProjectoController::class, 'edit'])->name('projecto.edit');
    Route::put('/{id}', [ProjectoController::class, 'update'])->name('projecto.update');
    Route::delete('/{id}', [ProjectoController::class, 'destroy'])->name('projecto.destroy');
});

Route::prefix('justificativa-falta')->group(function () {
    Route::get('/', [JustificativaFaltaController::class, 'index'])->name('justificativa_falta.index');
    Route::get('/create', [JustificativaFaltaController::class, 'create'])->name('justificativa_falta.create');
    Route::post('/', [JustificativaFaltaController::class, 'store'])->name('justificativa_falta.store');
    Route::get('/{id}/edit', [JustificativaFaltaController::class, 'edit'])->name('justificativa_falta.edit');
    Route::put('/{id}', [JustificativaFaltaController::class, 'update'])->name('justificativa_falta.update');
    Route::delete('/{id}', [JustificativaFaltaController::class, 'destroy'])->name('justificativa_falta.destroy');
});


Route::prefix('atraso')->group(function () {
    Route::get('/', [AtrasoController::class, 'index'])->name('atraso.index');
    Route::get('/create', [AtrasoController::class, 'create'])->name('atraso.create');
    Route::post('/', [AtrasoController::class, 'store'])->name('atraso.store');
    Route::get('/{id}/edit', [AtrasoController::class, 'edit'])->name('atraso.edit');
    Route::put('/{id}', [AtrasoController::class, 'update'])->name('atraso.update');
    Route::delete('/{id}', [AtrasoController::class, 'destroy'])->name('atraso.destroy');
});

Route::prefix('justificativaAtraso')->group(function () {
    Route::get('/', [JustificativaAtrasoController::class, 'index'])->name('justificativaAtraso.index');
    Route::get('/create', [JustificativaAtrasoController::class, 'create'])->name('justificativaAtraso.create');
    Route::post('/', [JustificativaAtrasoController::class, 'store'])->name('justificativaAtraso.store');
    Route::get('/{id}/edit', [JustificativaAtrasoController::class, 'edit'])->name('justificativaAtraso.edit');
    Route::put('/{id}', [JustificativaAtrasoController::class, 'update'])->name('justificativaAtraso.update');
    Route::delete('/{id}', [JustificativaAtrasoController::class, 'destroy'])->name('justificativaAtraso.destroy');
});

Route::prefix('CategoriaTarefa')->group(function () {
    Route::get('/', [CategoriaTarefaController::class, 'index'])->name('CategoriaTarefa.index');
    Route::get('/create', [CategoriaTarefaController::class, 'create'])->name('CategoriaTarefa.create');
    Route::post('/', [CategoriaTarefaController::class, 'store'])->name('CategoriaTarefa.store');
    Route::get('/{id}/edit', [CategoriaTarefaController::class, 'edit'])->name('CategoriaTarefa.edit');
    Route::put('/{id}', [CategoriaTarefaController::class, 'update'])->name('CategoriaTarefa.update');
    Route::delete('/{id}', [CategoriaTarefaController::class, 'destroy'])->name('CategoriaTarefa.destroy');
});
