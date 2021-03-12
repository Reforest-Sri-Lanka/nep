<?php

use LandParcel\Http\Controllers\LandController;

Route::get('/form', [LandController::class, 'form']);

Route::post('/save', [LandController::class, 'save']);

Route::get('/show/{id}', [LandController::class, 'show']);

Route::post('/ajax_upload/action', [LandController::class, 'action'])->name('ajaxmap.action');