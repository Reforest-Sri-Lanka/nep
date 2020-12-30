<?php

use ApprovalItem\Http\Controllers\ApprovalItemController;

Route::get('/home', [ApprovalItemController::class, 'home'])->name('approvalitem.home');

Route::get('/showRequests', [ApprovalItemController::class, 'showRequests']);

Route::get('/assignstaff/{id}', [ApprovalItemController::class, 'choose_assign_staff']);

Route::get('/investigate/{id}', [ApprovalItemController::class, 'check_record_details']);

Route::get('/confirmassign/{id}/{pid}', [ApprovalItemController::class, 'confirm_assign_staff']);