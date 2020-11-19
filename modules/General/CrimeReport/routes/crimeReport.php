<?php

use CrimeReport\Http\Controllers\CrimeReportController;

// Route::get('/home', [CrimeReportController::class, 'home'])->name('approvalitem.home');

// Route::get('/showRequests', [CrimeReportController::class, 'showRequests']);

Route::post('/crimecreate', [CrimeReportController::class, 'create_crime_report']);
Route::get('/crimehome', [CrimeReportController::class, 'crime_module_access_controller']);

Route::get('/newcrime', fn() => view('CrimeReport::logComplaint'));
Route::get('/general', [CrimeReportController::class, 'general_view_display']);

Route::get('/trackcrime', [CrimeReportController::class, 'track_user_crime_reports']);
Route::get('/assigncheck', [CrimeReportController::class, 'track_assigned_process_items']);
Route::get('/crimeadmin', [CrimeReportController::class, 'display_all_new_process_items']);
Route::get('/assign/{id}',[CrimeReportController::class, 'load_crimeAssign']);
Route::get('/check/{id}',[CrimeReportController::class, 'load_crimeInvestigate']);

Route::get('/searchauth', [CrimeReportController::class, 'search_specific_authorities']);
Route::post('/assignauth', [CrimeReportController::class, 'assign_authorities_crimereport']);
//Route::post('/treecutcreate', [CrimeReportController::class, 'create_tree_removal_request']);
//Route::get('/newtreecut',fn() => view('general.treecutting.treecut'));