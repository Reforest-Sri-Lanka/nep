<?php

use DevelopmentProject\Http\Controllers\DevelopmentProjectController;

Route::get('/manage_development_projects', [DevelopmentProjectController::class, 'manage_development_projects'])->name('manage-development-projects');

Route::middleware(['auth'])->group(function () {
//can be accessed by anyone who can create a request
Route::get('/create-development-project', [DevelopmentProjectController::class, 'create_development_project'])->name("create-development-project");
//route to save the form to the db
Route::post('/store-development-project', [DevelopmentProjectController::class, 'store_development_project']);
//route to show the created request
Route::get('/show/{id}',  [DevelopmentProjectController::class, 'show']); 
//route to delete a created request
Route::delete('/delete/{processid}/{devid}/{landid}', [DevelopmentProjectController::class, 'destroy']); 

Route::get('/view_development_project_progress/{pid}', [DevelopmentProjectController::class, 'view-development-project-progress']);

//AJAX autocomplete for gazette
Route::get('/autocompleteGazette', [DevelopmentProjectController::class, 'gazetteAutocomplete'])->name('gazette');

});