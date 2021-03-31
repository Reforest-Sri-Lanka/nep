<?php

use Reporting\Http\Controllers\ReportingController;

Route::get('/overview', [ReportingController::class, 'overview']); 
Route::get('/get-processItem-chart-data',[ReportingController::class, 'getMonthlyProcessItemData']);
Route::get('/get-processItem-formType-chart-data',[ReportingController::class, 'getProcessItemFormTypeData']);
Route::get('/get-processItem-assignedOrganization-chart-data',[ReportingController::class, 'getProcessItemOrganizationData']);

Route::get('/tree-removal', [ReportingController::class, 'treeRemoval']); 
Route::get('/get-treeRemoval-chart-data',[ReportingController::class, 'getMonthlyTreeRemovalData']);
Route::get('/get-treeRemoval-province-chart-data',[ReportingController::class, 'getTreeRemovalProvinceData']);
Route::get('/get-treeRemoval-district-chart-data',[ReportingController::class, 'getTreeRemovalDistrictData']);

Route::get('/restoration', [ReportingController::class, 'restoration']); 
Route::get('/get-restoration-chart-data',[ReportingController::class, 'getMonthlyRestorationData']);
Route::get('/get-restoration-type-chart-data',[ReportingController::class, 'getRestorationActivityTypeData']);
Route::get('/get-restoration-ecosystem-chart-data',[ReportingController::class, 'getRestorationEcosystemData']);
