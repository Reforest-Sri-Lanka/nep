<?php

use CrimeReport\Http\Controllers\CrimeReportController;

Route::post('/crimecreate', [CrimeReportController::class, 'create_crime_report']);
Route::get('/crimehome', [CrimeReportController::class, 'crime_module_access_controller'])->name("crime");
Route::get('/downloadimage/{path}/{file}',[CrimeReportController::class, 'download_image']);
Route::get('/newcrime',[CrimeReportController::class, 'crime_report_form_display']);
Route::get('/trackcrime', [CrimeReportController::class, 'track_user_crime_reports']);
Route::get('/assigncheck', [CrimeReportController::class, 'track_assigned_process_items']);
Route::get('/crimeadmin', [CrimeReportController::class, 'display_all_new_process_items']);
Route::get('/assign/{id}',[CrimeReportController::class, 'load_crimeAssign']);
Route::get('/check/{id}',[CrimeReportController::class, 'load_crimeInvestigate']);
Route::get('/searchauth', [CrimeReportController::class, 'search_specific_authorities']);
Route::post('/assignauth', [CrimeReportController::class, 'assign_authorities_crimereport']);

Route::get('/crimeTypeCreate', [CrimeReportController::class, 'create_crime_type']);
Route::get('/crimeTypeEdit/{id}', [CrimeReportController::class, 'edit_crime_type']);
Route::patch('/crimeTypeUpdate/{id}', [CrimeReportController::class, 'update_crime_type']);
Route::delete('/crimeTypeDelete/{id}', [CrimeReportController::class, 'delete_crime_type']);
Route::post('/crimeTypeStore', [CrimeReportController::class, 'store_crime_type']);