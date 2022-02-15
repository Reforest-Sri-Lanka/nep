<?php

use LandParcel\Http\Controllers\LandController;

Route::middleware(['auth'])->group(function () {
    Route::get('/manage-land-parcels', [LandController::class, 'manage_land_parcels'])->name('manage-land-parcels');

    Route::get('/form', [LandController::class, 'form'])->name("land");

    Route::post('/save', [LandController::class, 'save']);

    Route::patch('/update', [LandController::class, 'update']);

    Route::get('/show/{id}', [LandController::class, 'show']);

    Route::get('/edit/{id}', [LandController::class, 'edit']);

    Route::delete('/delete/{landid}', [LandController::class, 'destroy']);

    Route::post('/ajax_upload/action', [LandController::class, 'action'])->name('ajaxmap.action');

});