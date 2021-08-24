<?php

use EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController;

Route::middleware(['auth'])->group(function () {
Route::get('/manage_environment_restorations', [EnvironmentRestorationController::class, 'manage_environment_restorations'])->name('manage-environment-restorations');
Route::get('/index', [EnvironmentRestorationController::class, 'index']);
Route::get('/myIndex', [EnvironmentRestorationController::class, 'myIndex']);
Route::get('/show_full_env_restoration/{id}', [EnvironmentRestorationController::class, 'show_full_env_restoration']);
Route::patch('/envRestoration/update/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@update'); 
Route::get('/create_environment_restoration', [EnvironmentRestorationController::class, 'create_environment_restoration'])->name("create-environment-restoration");;
Route::post('/store', [EnvironmentRestorationController::class, 'store'])->name('store.dynamic-species'); ; 
Route::get('/progressUpdate/{pid}', [EnvironmentRestorationController::class, 'progress_update']);
Route::get('/view_environment_restoration_progress/{pid}', [EnvironmentRestorationController::class, 'view_environment_restoration_progress']);
Route::post('/progressSave', [EnvironmentRestorationController::class, 'progress_save'])->name('update.species');

});