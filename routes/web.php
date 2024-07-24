<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard.index');


Route::prefix('user')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user.index');
    Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('user.create');
    Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
    Route::get('/show/{id}', [App\Http\Controllers\Admin\UserController::class, 'show'])->name('user.show');
    Route::get('/destroy/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('user.destroy');
});
