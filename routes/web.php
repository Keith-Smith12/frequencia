<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AtrasoController;
use App\Http\Controllers\admin\exemploController;
use App\Http\Controllers\admin\FrequenciaController;
use App\Http\Controllers\admin\JustificativaFaltaController;
use App\Http\Controllers\admin\ProjectoController;
use App\Http\Controllers\admin\TarefaController;
use App\Http\Controllers\admin\TarefaUsuarioController;


Route::get('/', function () {
    return view('Site.auth.login');
})->name('login');
Route::get('/register', function () {
    return view('Site.auth.register');
})->name('register');

Route::prefix('user')->group(function () {
    Route::get('/', ['as' => 'user.index', 'uses' => "App\Http\Controllers\UserController@index"]);
    Route::get('/show/{id}', ['as' => 'user.show', 'uses' => "App\Http\Controllers\UserController@show"]);
    Route::get('/create', ['as' => 'user.create', 'uses' => "App\Http\Controllers\UserController@create"]);
    Route::post('/store', ['as' => 'user.store', 'uses' => "App\Http\Controllers\UserController@store"]);
    Route::put('/edit/{id}', ['as' => 'user.edit', 'uses' => "App\Http\Controllers\UserController@edit"]);   
    Route::put('/update/{id}', ['as' => 'user.update', 'uses' => "App\Http\Controllers\UserController@update"]);
    Route::delete('/delete/{id}', ['as' => 'user.delete', 'uses' => "App\Http\Controllers\UserController@delete"]);
});

Route::prefix('auth')->group(function () {
    Route::post('/login', ['as' => 'auth.login', 'uses' => "App\Http\Controllers\AuthController@login"]);
    Route::post('/logout', ['as' => 'auth.logout', 'uses' => "App\Http\Controllers\AuthController@logout"]);    
});

Route::prefix('exemplo')->group(function () {
    Route::get('/', [exemploController::class, 'index'])->name('exemplo.index');
    Route::post('/', [exemploController::class, 'store'])->name('exemplo.store');
    Route::get('/{id}', [exemploController::class, 'show'])->name('exemplo.show');
    Route::put('/{id}', [exemploController::class, 'update'])->name('exemplo.update');
    Route::delete('/{id}', [exemploController::class, 'destroy'])->name('exemplo.destroy');
});

Route::prefix('frequencia')->group(function () {
    Route::get('/', [FrequenciaController::class, 'index'])->name('frequencia.index');
    Route::post('/', [FrequenciaController::class, 'store'])->name('frequencia.store');
    Route::get('/{id}', [FrequenciaController::class, 'show'])->name('frequencia.show');
    Route::put('/{id}', [FrequenciaController::class, 'update'])->name('frequencia.update');
    Route::delete('/{id}', [FrequenciaController::class, 'destroy'])->name('frequencia.destroy');
});

Route::prefix('tarefa')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefa.index');
    Route::post('/', [TarefaController::class, 'store'])->name('tarefa.store');
    Route::get('/{id}', [TarefaController::class, 'show'])->name('tarefa.show');
    Route::put('/{id}', [TarefaController::class, 'update'])->name('tarefa.update');
    Route::delete('/{id}', [TarefaController::class, 'destroy'])->name('tarefa.destroy');
});

Route::prefix('tarefaUsuario')->group(function () {
    Route::get('/', [TarefaUsuarioController::class, 'index'])->name('tarefaUsuario.index');
    Route::post('/', [TarefaUsuarioController::class, 'store'])->name('tarefaUsuario.store');
    Route::get('/{id}', [TarefaUsuarioController::class, 'show'])->name('tarefaUsuario.show');
    Route::put('/{id}', [TarefaUsuarioController::class, 'update'])->name('tarefaUsuario.update');
    Route::delete('/{id}', [TarefaUsuarioController::class, 'destroy'])->name('tarefaUsuario.destroy');
});

Route::prefix('projecto')->group(function () {
    Route::get('/', [ProjectoController::class, 'index'])->name('projecto.index');
    Route::post('/', [ProjectoController::class, 'store'])->name('projecto.store');
    Route::get('/{id}', [ProjectoController::class, 'show'])->name('projecto.show');
    Route::put('/{id}', [ProjectoController::class, 'update'])->name('projecto.update');
    Route::delete('/{id}', [ProjectoController::class, 'destroy'])->name('projecto.destroy');
});

Route::prefix('justificativa-falta')->group(function () {
    // Rota para listar todas as justificativas de falta
    Route::get('/', [JustificativaFaltaController::class, 'index'])->name('justificativa_falta.index');

    // Rota para criar uma nova justificativa de falta
    Route::post('/', [JustificativaFaltaController::class, 'store'])->name('justificativa_falta.store');

    // Rota para exibir uma justificativa de falta específica
    Route::get('/{id}', [JustificativaFaltaController::class, 'show'])->name('justificativa_falta.show');

    // Rota para atualizar uma justificativa de falta existente
    Route::put('/{id}', [JustificativaFaltaController::class, 'update'])->name('justificativa_falta.update');

    // Rota para excluir uma justificativa de falta
    Route::delete('/{id}', [JustificativaFaltaController::class, 'destroy'])->name('justificativa_falta.destroy');
});


Route::prefix('atraso')->group(function () {
    // Rota para listar todos os atrasos
    Route::get('/', [AtrasoController::class, 'index'])->name('atraso.index');

    // Rota para criar um novo atraso
    Route::post('/', [AtrasoController::class, 'store'])->name('atraso.store');

    // Rota para exibir um atraso específico
    Route::get('/{id}', [AtrasoController::class, 'show'])->name('atraso.show');

    // Rota para atualizar um atraso existente
    Route::put('/{id}', [AtrasoController::class, 'update'])->name('atraso.update');

    // Rota para excluir um atraso
    Route::delete('/{id}', [AtrasoController::class, 'destroy'])->name('atraso.destroy');
});
