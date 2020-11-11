<?php

use Admin\Http\Controllers\AdminController;


Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

Route::get('/index', [AdminController::class, 'index']);

Route::get('/create', [AdminController::class, 'create']);

Route::get('/more/{$id}', [AdminController::class, 'more']);

Route::get('/edit/{$id}', [AdminController::class, 'edit']);
Route::patch('/update/{$id}', [AdminController::class, 'update']);

Route::delete('/delete/{$id}', [AdminController::class, 'destroy']);