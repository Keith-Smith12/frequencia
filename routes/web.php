<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Site/Pages/Noticias/show');
});
