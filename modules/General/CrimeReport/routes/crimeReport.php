<?php

use CrimeReport\Http\Controllers\CrimeReportController;

Route::post('/crimecreate', [CrimeReportController::class, 'create_crime_report']);
Route::get('/downloadimage/{path}/{file}',[CrimeReportController::class, 'download_image']);
Route::get('/viewimage/{path}/{file}',[CrimeReportController::class, 'view_image']);
Route::get('/newcrime',[CrimeReportController::class, 'crime_report_form_display']);
Route::get('/viewcrime/{id}',[CrimeReportController::class, 'view_crime_reports']);


Route::get('/crimeTypeCreate', [CrimeReportController::class, 'create_crime_type']);
Route::get('/crimeTypeEdit/{id}', [CrimeReportController::class, 'edit_crime_type']);
Route::patch('/crimeTypeUpdate/{id}', [CrimeReportController::class, 'update_crime_type']);
Route::delete('/crimeTypeDelete/{id}', [CrimeReportController::class, 'delete_crime_type']);
Route::post('/crimeTypeStore', [CrimeReportController::class, 'store_crime_type']);