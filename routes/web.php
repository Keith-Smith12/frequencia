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
    Route::put('/edit/{id}', ['as' => 'user.edit', 'uses' => "App\Http\Controllers\UserController@edit"]);   
    Route::put('/update/{id}', ['as' => 'user.update', 'uses' => "App\Http\Controllers\UserController@update"]);
    Route::delete('/delete/{id}', ['as' => 'user.delete', 'uses' => "App\Http\Controllers\UserController@delete"]);
});
