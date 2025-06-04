<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio.index');
});

Route::get('/create', function () {
    return view('portfolio.create');
});

Route::post('/store',[ProjectController::class, 'store'])->name('portfolio.store');
