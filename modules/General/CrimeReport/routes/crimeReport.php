<?php

use CrimeReport\Http\Controllers\CrimeReportController;


Route::post('/crimecreate', [CrimeReportController::class, 'create_crime_report']);
Route::get('/crimehome', [CrimeReportController::class, 'crime_module_access_controller']);


Route::get('/newcrime',[CrimeReportController::class, 'crime_report_form_display']);


Route::get('/trackcrime', [CrimeReportController::class, 'track_user_crime_reports']);
Route::get('/assigncheck', [CrimeReportController::class, 'track_assigned_process_items']);
Route::get('/crimeadmin', [CrimeReportController::class, 'display_all_new_process_items']);
Route::get('/assign/{id}',[CrimeReportController::class, 'load_crimeAssign']);
Route::get('/check/{id}',[CrimeReportController::class, 'load_crimeInvestigate']);

Route::get('/searchauth', [CrimeReportController::class, 'search_specific_authorities']);
Route::post('/assignauth', [CrimeReportController::class, 'assign_authorities_crimereport']);
