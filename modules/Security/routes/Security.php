<?php


use Security\Http\Controllers\SecurityController;


Route::get('/process-item/{id}', [SecurityController::class, 'auditdisplay']); 

Route::get('/process-item/{id}', [SecurityController::class, 'auditdisplay']); 

Route::get('/individual/{id}/{pid}/{type}', [SecurityController::class, 'moredetails']); 

Route::get('/user/{id}', [SecurityController::class, 'userauditdisplay']); 

Route::get('/user-individual/{id}/{uid}', [SecurityController::class, 'usermoredetails']); 