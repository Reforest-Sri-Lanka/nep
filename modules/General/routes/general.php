<?php

use General\Http\Controllers\GeneralController;

Route::get('/home', [ApprovalItemController::class, 'home'])->name('approvalitem.home');

Route::get('/showRequests', [ApprovalItemController::class, 'showRequests']);

Route::get('/general', [GeneralController::class, 'general_module_access_control']);