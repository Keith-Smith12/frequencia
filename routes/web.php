<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AtrasoController;
use App\Http\Controllers\admin\exemploController;
use App\Http\Controllers\admin\FrequenciaController;
use App\Http\Controllers\admin\JustificativaAtrasoController;
use App\Http\Controllers\admin\JustificativaFaltaController;
use App\Http\Controllers\admin\ProjectoController;
use App\Http\Controllers\categoriaTarefaController;
use App\Http\Controllers\admin\TarefaController;
use App\Http\Controllers\admin\TarefaUsuarioController;
use App\Http\Controllers\admin\UsuarioController;
use App\Models\JustificativaAtraso;
use Illuminate\Support\Facades\Route;



Route::prefix('exemplo')->group(function () {
    Route::get('/', [exemploController::class, 'index'])->name('exemplo.index');
    Route::post('/', [exemploController::class, 'store'])->name('exemplo.store');
    Route::get('/{id}', [exemploController::class, 'show'])->name('exemplo.show');
    Route::put('/{id}', [exemploController::class, 'update'])->name('exemplo.update');
    Route::delete('/{id}', [exemploController::class, 'destroy'])->name('exemplo.destroy');
});

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::post('/', [UsuarioController::class, 'store'])->name('usuario.store');
    Route::get('/{id}', [UsuarioController::class, 'show'])->name('usuario.show');
    Route::put('/{id}', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');
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

Route::prefix('categoriaTarefa')->group(function () {
    #Rota de listagem de categoriaTarefa
    Route::get('/', [categoriaTarefaController::class, 'index'])->name('categoriaTarefa.index');
    #Rota de criação de novos categoriaTarefa (validação e armazenamento dos dados)
    Route::post('/store', [categoriaTarefaController::class, 'store'])->name('categoriaTarefa.store');
    #Rota de validação dos daods editados
    Route::put('/update/{id}', [categoriaTarefaController::class, 'update'])->name('categoriaTarefa.update');
    #Rota que elimina categoriaTarefa (envia para a lixeira)
    Route::delete('/delete/{id}', [categoriaTarefaController::class, 'destroy'])->name('categoriaTarefa.destroy');

});

Route::get('/', [AdminController::class, 'dashboard'])->name('dash');

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

Route::prefix('justificativaAtraso')->group(function () {
    // Listar todas as justificativas de atraso
    Route::get('/', [JustificativaAtrasoController::class, 'index'])->name('justificativaAtraso.index');

    // Armazenar nova justificativa de atraso
    Route::post('/', [JustificativaAtrasoController::class, 'store'])->name('justificativaAtraso.store');

    // Exibir uma justificativa de atraso específica
    Route::get('/{id}', [JustificativaAtrasoController::class, 'show'])->name('justificativaAtraso.show');

    // Atualizar justificativa de atraso existente
    Route::put('/{id}', [JustificativaAtrasoController::class, 'update'])->name('justificativaAtraso.update');

    // Excluir justificativa de atraso
    Route::delete('/{id}', [JustificativaAtrasoController::class, 'destroy'])->name('justificativaAtraso.destroy');
});

/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
