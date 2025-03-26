<?php

use App\Http\Controllers\admin\exemploController;
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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
