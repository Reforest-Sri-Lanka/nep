<?php

use CrimeReport\Http\Controllers\CrimeReportController;

Route::get('/crimemain', [CrimeReportController::class, 'crime_home_display'])->name("crimeMain");
Route::post('/crimecreate', [CrimeReportController::class, 'create_crime_report']);
Route::post('/trackcrime', [CrimeReportController::class, 'track_crime_reports']);
Route::get('/crimeedit/{pid}', [CrimeReportController::class, 'crime_report_edit']);
Route::patch('/crimeupdate', [CrimeReportController::class, 'update_crime_report']);
Route::get('/downloadimage/{path}/{file}',[CrimeReportController::class, 'download_image']);
Route::get('/viewimage/{path}/{file}',[CrimeReportController::class, 'view_image']);
Route::get('/newcrime',[CrimeReportController::class, 'crime_report_form_display'])->name("crime");
Route::get('/viewcrime/{id}',[CrimeReportController::class, 'view_crime_reports']);


Route::get('/crimeTypeCreate', [CrimeReportController::class, 'create_crime_type']);
Route::get('/crimeTypeEdit/{id}', [CrimeReportController::class, 'edit_crime_type']);
Route::patch('/crimeTypeUpdate/{id}', [CrimeReportController::class, 'update_crime_type']);
Route::delete('/crimeTypeDelete/{id}', [CrimeReportController::class, 'delete_crime_type']);
Route::post('/crimeTypeStore', [CrimeReportController::class, 'store_crime_type']);