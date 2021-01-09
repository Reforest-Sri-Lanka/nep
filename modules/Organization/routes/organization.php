<?php

use Organization\Http\Controllers\AdminController;
use Organization\Http\Controllers\OrganizationController;
use Organization\Http\Controllers\UserController;
use Organization\Http\Controllers\TypeController;

Route::get('/index', [OrganizationController::class, 'index']); 

// Open create view.
Route::get('/create', [OrganizationController::class, 'create']);      

// Store data in the database. 
Route::post('/store', [OrganizationController::class, 'store']);       

// Open edit view.
Route::get('/edit/{id}', [OrganizationController::class, 'edit']);         

// Store changes in the db.
Route::patch('/update/{id}', [OrganizationController::class, 'update']);   

// Delete a organization.
Route::delete('/delete/{id}', [OrganizationController::class, 'destroy']);     

//More details.
Route::get('/more/{id}', [OrganizationController::class, 'more']);              

//Fetch Contact Types.
Route::any('/create','Organization\Http\Controllers\TypeController@getTypesList'); 