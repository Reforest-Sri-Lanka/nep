<?php

use ApprovalItem\Http\Controllers\ApprovalItemController;

Route::get('/home', [ApprovalItemController::class, 'home'])->name('approvalitem.home');

Route::get('/showRequests', [ApprovalItemController::class, 'showRequests']);