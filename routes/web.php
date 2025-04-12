<?php

use App\Http\Controllers\admin\exemploController;
use App\Http\Controllers\tarefaController;
use App\Http\Controllers\projectoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.index');
});

Route::prefix('exemplo')->group(function () {
    Route::get('/', [exemploController::class, 'index'])->name('exemplo.index');
    Route::post('/', [exemploController::class, 'store'])->name('exemplo.store');
    Route::get('/{id}', [exemploController::class, 'show'])->name('exemplo.show');
    Route::put('/{id}', [exemploController::class, 'update'])->name('exemplo.update');
    Route::delete('/{id}', [exemploController::class, 'destroy'])->name('exemplo.destroy');
});

Route::prefix('tarefa')->group(function () {
    #Rota de listagem de tarefas
    Route::get('/', [tarefaController::class, 'index'])->name('tarefa.index');
    #Rota de criação de novas tarefas (validação e armazenamento dos dados)
    Route::post('/store', [tarefaController::class, 'store'])->name('tarefa.store');
    Route::put('/update/{id}', [tarefaController::class, 'update'])->name('tarefa.update');
    #Rota que envia a tarefa para a lixeira
    Route::post('/delete/{id}', [tarefaController::class, 'destroy'])->name('tarefa.destroy');
    #Rota que permite acessar a lixeira
    Route::get('/purge', [tarefaController::class, 'redirectToPurgeView'])->name('tarefa.purge-view');
    #Rota que deleta permanentemente a tarefa
    Route::get('/purge/{id}', [tarefaController::class, 'purge'])->name('tarefa.purge');
    #Rota que restura a tarefa
    Route::get('/restaurar/{id}', [tarefaController::class, 'restaurar'])->name('tarefa.restaurar');
});

Route::prefix('projecto')->group(function () {
    #Rota de listagem de projectos
    Route::get('/', [projectoController::class, 'index'])->name('projecto.index');
    #Rota que redireciona para a view de criação de novos projectos
    Route::get('/create', [projectoController::class, 'create'])->name('projecto.create');
    #Rota de criação de novos projectos (validação e armazenamento dos dados)
    Route::post('/store', [projectoController::class, 'store'])->name('projecto.store');
    #Rota que redireciona para a view de edição dos dados do projecto
    Route::get('/edit/{id}', [projectoController::class, 'edit'])->name('projecto.edit');
    #Rota de validação dos daods editados
    Route::get('/update/{id}', [projectoController::class, 'update'])->name('projecto.update');
    #Rota que elimina projectos (envia para a lixeira)
    Route::post('/delete/{id}', [projectoController::class, 'destroy'])->name('projecto.destroy');
    #Rota que permite acessar a lixeira
    Route::get('/purge', [projectoController::class, 'redirectToPurgeView'])->name('projecto.purge-view');
    #Rota que deleta o projecto permanentemente
    Route::delete('/purge/{id}', [projectoController::class, 'purge'])->name('projecto.purge');
    #rota que permite restaurar os projectos
    Route::post('/restaurar/{id}', [projectoController::class, 'restaurar'])->name('projecto.restaurar');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
