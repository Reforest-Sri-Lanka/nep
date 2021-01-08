<?php

use Environment\Http\Controllers\EnvController;
use Environment\Http\Controllers\SpeciesController;

Route::get('/home', [EnvController::class, 'home'])->name('environment.home');

Route::get('/generalenv', fn() => view('environment::environment'));
Route::get('/createrequest', fn() => view('environment::request'));



Route::get('/newrequest', fn() => view('environment::environmenthome'));
Route::get('/newspecies', fn() => view('environment::species'));

//Route::get('/requesteco', fn() => view('environment::request')); --no need of two routes two to link to the same view
Route::get('/neweco', fn() => view('environment::ecohome'));
Route::post('/newrequest', [EnvController::class, 'store']);
Route::put('/environment/updatestatus/{id}',[EnvController::class, 'statusupdate']);

Route::get('/updatedata', [EnvController::class, 'index']);
Route::get('/deletedataeco', fn() => view('environment::checkstatuseco'));


Route::get('edit', [EnvController::class, 'edit']);

Route::get('/deleterequest', fn() => view('environment::checkstatuseco'));

Route::delete('delete-request/{id}',[EnvController::class, 'delete']);


Route::post('/newspecies',[SpeciesController::class, 'store']);
Route::get('/trackrequst',[SpeciesController::class, 'track']);
Route::put('/environmentspe/updatestatus/{id}',[SpeciesController::class, 'statusupdate']);
Route::get('/requestdataeco', fn() => view('environment::trackrequesteco'));

Route::get('/trackrequsteco',[EnvController::class, 'track']);

//Route::get('/trackrequesteco', 'EnvController@showRequest');
Route::get('/updatedataspecies',[SpeciesController::class, 'index']);

Route::get('/requestspecies',[SpeciesController::class, 'form']);
Route::get('/updatedataspecies', [SpeciesController::class, 'index']); 

Route::delete('delete-requestspecies/{id}',[SpeciesController::class, 'delete']);