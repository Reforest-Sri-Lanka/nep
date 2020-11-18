<?php

use EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController;


Route::get('/index', [EnvironmentRestorationController::class, 'index']);

Route::get('/show/{id}', [EnvironmentRestorationController::class, 'show']);

/* Route::get('/envRestoration/edit/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@edit');

Route::patch('/envRestoration/update/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@update'); */

Route::get('/create', [EnvironmentRestorationController::class, 'create']);

Route::post('/store', [EnvironmentRestorationController::class, 'store']); 