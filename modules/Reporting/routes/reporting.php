<?php

use Reporting\Http\Controllers\ReportingController;
Route::middleware(['auth'])->group(function () {
Route::get('/overview', [ReportingController::class, 'overview']); 
Route::get('/get-processItem-chart-data',[ReportingController::class, 'getMonthlyProcessItemData']);
Route::get('/get-processItem-formType-chart-data',[ReportingController::class, 'getProcessItemFormTypeData']);
Route::get('/get-processItem-assignedOrganization-chart-data',[ReportingController::class, 'getProcessItemOrganizationData']);
Route::get('/filterOverview',[ReportingController::class, 'filterOverview']);
Route::post('/overview-report',[ReportingController::class, 'overviewReport']);

Route::get('/tree-removal', [ReportingController::class, 'treeRemoval']); 
Route::get('/get-treeRemoval-chart-data',[ReportingController::class, 'getMonthlyTreeRemovalData']);
Route::get('/get-treeRemoval-province-chart-data',[ReportingController::class, 'getTreeRemovalProvinceData']);
Route::get('/get-treeRemoval-district-chart-data',[ReportingController::class, 'getTreeRemovalDistrictData']);

Route::get('/restoration', [ReportingController::class, 'restoration']); 
Route::get('/get-restoration-chart-data',[ReportingController::class, 'getMonthlyRestorationData']);
Route::get('/get-restoration-type-chart-data',[ReportingController::class, 'getRestorationActivityTypeData']);
Route::get('/get-restoration-ecosystem-chart-data',[ReportingController::class, 'getRestorationEcosystemData']);

Route::get('/dev-proj', [ReportingController::class, 'devProject']); 
Route::get('/get-developmentProject-chart-data',[ReportingController::class, 'getMonthlyDevelopmentProjectData']);
Route::get('/get-developmentProject-organization-chart-data',[ReportingController::class, 'getDevelopmentProjectOrganizationData']);

Route::get('/complaints', [ReportingController::class, 'crimeReport']); 
Route::get('/get-crimeReport-chart-data',[ReportingController::class, 'getMonthlyCrimeReportData']);
Route::get('/get-crimeReport-type-chart-data',[ReportingController::class, 'getCrimeReportTypeData']);
Route::get('/get-crimeReport-actionTaken-chart-data',[ReportingController::class, 'getCrimeReportActionTakenData']);

});