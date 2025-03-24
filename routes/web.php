<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/edit/{id}', ['as' => 'user.edit', 'uses' => "App\Http\Controllers\UserController@edit"]);   
    Route::put('/update/{id}', ['as' => 'user.update', 'uses' => "App\Http\Controllers\UserController@update"]);
    Route::delete('/delete/{id}', ['as' => 'user.delete', 'uses' => "App\Http\Controllers\UserController@delete"]);
});

Route::prefix('atrasos')->group(function () {
    Route::get('/', ['as' => 'atrasos.index', 'uses' => "App\Http\Controllers\AtrasoController@index"]);
    Route::get('/show/{id}', ['as' => 'atrasos.show', 'uses' => "App\Http\Controllers\AtrasoController@show"]);
    Route::get('/create', ['as' => 'atrasos.create', 'uses' => "App\Http\Controllers\AtrasoController@create"]);
    Route::post('/store', ['as' => 'atrasos.store', 'uses' => "App\Http\Controllers\AtrasoController@store"]);
    Route::get('/edit/{id}', ['as' => 'atrasos.edit', 'uses' => "App\Http\Controllers\AtrasoController@edit"]);   
    Route::put('/update/{id}', ['as' => 'atrasos.update', 'uses' => "App\Http\Controllers\AtrasoController@update"]);
    Route::delete('/delete/{id}', ['as' => 'atrasos.delete', 'uses' => "App\Http\Controllers\AtrasoController@delete"]);
});

Route::prefix('justificativaAtrasos')->group(function () {
    Route::get('/', ['as' => 'justificativaAtrasos.index', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@index"]);
    Route::get('/show/{id}', ['as' => 'justificativaAtrasos.show', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@show"]);
    Route::get('/create', ['as' => 'justificativaAtrasos.create', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@create"]);
    Route::post('/store', ['as' => 'justificativaAtrasos.store', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@store"]);
    Route::get('/edit/{id}', ['as' => 'justificativaAtrasos.edit', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@edit"]);   
    Route::put('/update/{id}', ['as' => 'justificativaAtrasos.update', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@update"]);
    Route::delete('/delete/{id}', ['as' => 'justificativaAtrasos.delete', 'uses' => "App\Http\Controllers\JustificativaAtrasoController@delete"]);
});

Route::prefix('justificativaFaltas')->group(function () {
    Route::get('/', ['as' => 'justificativaFaltas.index', 'uses' => "App\Http\Controllers\JustificativaFaltaController@index"]);
    Route::get('/show/{id}', ['as' => 'justificativaFaltas.show', 'uses' => "App\Http\Controllers\JustificativaFaltaController@show"]);
    Route::get('/create', ['as' => 'justificativaFaltas.create', 'uses' => "App\Http\Controllers\JustificativaFaltaController@create"]);
    Route::post('/store', ['as' => 'justificativaFaltas.store', 'uses' => "App\Http\Controllers\JustificativaFaltaController@store"]);
    Route::get('/edit/{id}', ['as' => 'justificativaFaltas.edit', 'uses' => "App\Http\Controllers\JustificativaFaltaController@edit"]);   
    Route::put('/update/{id}', ['as' => 'justificativaFaltas.update', 'uses' => "App\Http\Controllers\JustificativaFaltaController@update"]);
    Route::delete('/delete/{id}', ['as' => 'justificativaFaltas.delete', 'uses' => "App\Http\Controllers\JustificativaFaltaController@delete"]);
});

Route::prefix('categoriaTarefas')->group(function () {
    Route::get('/', ['as' => 'categoriaTarefas.index', 'uses' => "App\Http\Controllers\CategoriaTarefaController@index"]);
    Route::get('/show/{id}', ['as' => 'categoriaTarefas.show', 'uses' => "App\Http\Controllers\CategoriaTarefaController@show"]);
    Route::get('/create', ['as' => 'categoriaTarefas.create', 'uses' => "App\Http\Controllers\CategoriaTarefaController@create"]);
    Route::post('/store', ['as' => 'categoriaTarefas.store', 'uses' => "App\Http\Controllers\CategoriaTarefaController@store"]);
    Route::get('/edit/{id}', ['as' => 'categoriaTarefas.edit', 'uses' => "App\Http\Controllers\CategoriaTarefaController@edit"]);   
    Route::put('/update/{id}', ['as' => 'categoriaTarefas.update', 'uses' => "App\Http\Controllers\CategoriaTarefaController@update"]);
    Route::delete('/delete/{id}', ['as' => 'categoriaTarefas.delete', 'uses' => "App\Http\Controllers\CategoriaTarefaController@delete"]);
});
