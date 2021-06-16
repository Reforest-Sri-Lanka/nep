<?php

use EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController;

Route::middleware(['auth'])->group(function () {
Route::get('/index', [EnvironmentRestorationController::class, 'index']);
Route::get('/myIndex', [EnvironmentRestorationController::class, 'myIndex']);
Route::get('/show/{id}', [EnvironmentRestorationController::class, 'show']);
Route::patch('/envRestoration/update/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@update'); 
Route::get('/create', [EnvironmentRestorationController::class, 'create'])->name("envrestoration");;
Route::post('/store', [EnvironmentRestorationController::class, 'store'])->name('store.dynamic-species'); ; 
Route::get('/progressUpdate/{pid}', [EnvironmentRestorationController::class, 'progress_update']);
Route::get('/progressView/{pid}', [EnvironmentRestorationController::class, 'progress_view']);
Route::post('/progressSave', [EnvironmentRestorationController::class, 'progress_save'])->name('update.species');

});