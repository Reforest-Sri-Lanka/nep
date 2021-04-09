<?php

use DevelopmentProject\Http\Controllers\DevelopmentProjectController;

Route::get('/home', [DevelopmentProjectController::class, 'home'])->name('developmentproject.home');

Route::get('/check', [DevelopmentProjectController::class, 'test']);

Route::get('/applicationForm', [DevelopmentProjectController::class, 'form'])->name("devproject");

Route::post('/saveForm', [DevelopmentProjectController::class, 'save']);

Route::get('/show/{id}',  [DevelopmentProjectController::class, 'show']); 

Route::get('/autocompleteGazette', [DevelopmentProjectController::class, 'gazetteAutocomplete'])->name('gazette');