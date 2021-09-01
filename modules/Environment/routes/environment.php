<?php

use Environment\Http\Controllers\EnvController;
use Environment\Http\Controllers\SpeciesController;
use Environment\Http\Controllers\TypeController;

Route::middleware(['auth'])->group(function () {

Route::get('/home', [EnvController::class, 'home'])->name('environment.home');
//General view of the env module
Route::get('/generalenv', fn() => view('environment::Envmain'));
// To collect the eco systems data through a form 
//Route::get('/createrequest', fn() => view('environment::request'));

Route::get('/createrequest', [EnvController::class, 'loadform']);


//Route::get('/newrequest', fn() => view('environment::environmenthome'));


//Route::get('/requesteco', fn() => view('environment::request')); --no need of two routes two to link to the same view
//Route::get('/neweco', fn() => view('environment::ecohome'));
Route::post('/newrequest', [EnvController::class, 'store']);
Route::put('/environment/updatestatus/{id}',[EnvController::class, 'statusupdate']);

Route::get('/updatedata', [EnvController::class, 'index']);


// To edit the request 
Route::get('edit', [EnvController::class, 'edit']);

Route::get('/deleterequest', fn() => view('environment::Envindex'));
//Delete the request by the authorized party
Route::delete('delete-request/{id}',[EnvController::class, 'delete']);



Route::get('/requestdataeco', fn() => view('environment::trackrequesteco'));

Route::get('/trackrequsteco',[EnvController::class, 'track']);
//More details button , users can see the details of the request
Route::get('/moreeco/{id}', [EnvController::class, 'more']);


//////////// Species module

// To collect species info through a form 
Route::get('/requestspecies',[SpeciesController::class, 'form']);
Route::get('/updatedataspecies', [SpeciesController::class, 'index']); 
//Route::get('/trackrequesteco', 'EnvController@showRequest');
Route::get('/updatedataspecies',[SpeciesController::class, 'index']);

Route::delete('delete-requestspecies/{id}',[SpeciesController::class, 'delete']);
Route::post('/newspecies',[SpeciesController::class, 'store']);
Route::get('/trackrequst',[SpeciesController::class, 'track']);
Route::put('/environmentspe/updatestatus/{id}',[SpeciesController::class, 'statusupdate']);
Route::get('/newspecies', fn() => view('environment::species'));
Route::get('/morespecies/{id}', [SpeciesController::class, 'more']);

});