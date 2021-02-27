<?php

use TreeRemoval\Http\Controllers\TreeRemovalController;

Route::get('/home', [TreeRemovalController::class, 'home'])->name('treeremoval.home');

Route::get('/form', [TreeRemovalController::class, 'openForm']);

Route::post('/save', [TreeRemovalController::class, 'save']);

Route::get('/show/{id}', [TreeRemovalController::class, 'show']);

Route::get('/autocompleteProvince', [TreeRemovalController::class, 'provinceAutocomplete'])->name('province');
Route::get('/autocompleteDistrict', [TreeRemovalController::class, 'districtAutocomplete'])->name('district');
Route::get('/autocompleteOrgs', [TreeRemovalController::class, 'organizationAutocomplete'])->name('organization');
Route::get('/autocompleteGSdiv', [TreeRemovalController::class, 'GSAutocomplete'])->name('gramasevaka');