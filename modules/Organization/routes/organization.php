<?php

use Organization\Http\Controllers\AdminController;
use Organization\Http\Controllers\OrganizationController;
use Organization\Http\Controllers\UserController;

// index page for Organization.
Route::get('/index', [OrganizationController::class, 'index']); 

//ACTIONS      

Route::get('/create', [OrganizationController::class, 'create']);      // Open create view.

Route::post('/store', [OrganizationController::class, 'store']);       // Store data in the database. 

Route::get('/edit/{id}', [OrganizationController::class, 'edit']);         // Open edit view.

Route::patch('/update/{id}', [OrganizationController::class, 'update']);   // Store changes in the db.

Route::delete('/delete/{id}', [OrganizationController::class, 'destroy']);   // Delete a organization.

Route::get('/more/{id}', [OrganizationController::class, 'more']);  //More details button for all users.

