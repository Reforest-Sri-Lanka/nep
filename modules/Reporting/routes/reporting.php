<?php

use Reporting\Http\Controllers\ReportingController;

Route::get('/overview', [ReportingController::class, 'overview']); 
Route::get('/get-processItem-chart-data',[ReportingController::class, 'getMonthlyProcessItemData']);
Route::get('/get-processItem-formType-chart-data',[ReportingController::class, 'getProcessItemFormTypeData']);
Route::get('/get-processItem-assignedOrganization-chart-data',[ReportingController::class, 'getProcessItemOrganizationData']);

