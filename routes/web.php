<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('test/dashboard');
})->middleware(['auth', 'verified']);

//Route::get('/admin', 'AdministratorController@index');

Route::get('/general', function(){
    return view('test/mainview');
});



//Route::get('/roles', [RoleController::class, 'fetchAllRoles']);
//Route::get('/arole', [RoleController::class, 'fetchARole']);
// Route::get('/lighthome', function () {
//     return view('test2');
// });
// Route::get('/dash', function () {
//     return view('test3');
// });

//Environment Module

Route::get('/generalenv', fn() => view('environment.environment'));
Route::get('/createrequest', fn() => view('environment.request'));



Route::get('/newrequest', fn() => view('environment.environmenthome'));
Route::get('/newspecies', fn() => view('environment.species'));

Route::get('/requesteco', fn() => view('environment.request'));
Route::get('/neweco', fn() => view('environment.ecohome'));
Route::post('/newrequest', 'EnvController@store');
Route::put('/environment/updatestatus/{id}', 'EnvController@statusupdate');

Route::get('/updatedata', 'EnvController@index');
Route::get('/deletedataeco', fn() => view('environment.checkstatuseco'));


Route::get('edit', 'EnvController@edit');

Route::get('/deleterequest', fn() => view('environment.checkstatuseco'));

Route::delete('delete-request/{id}', 'EnvController@delete');


Route::post('/newspecies', 'SpeciesController@store');
Route::get('/trackrequst', 'SpeciesController@track');
Route::put('/environmentspe/updatestatus/{id}', 'SpeciesController@statusupdate');
Route::get('/requestdataeco', fn() => view('environment.trackrequesteco'));

Route::get('/trackrequsteco', 'EnvController@track');

//Route::get('/trackrequesteco', 'EnvController@showRequest');
Route::get('/updatedataspecies', 'SpeciesController@index');

Route::get('/requestspecies', 'SpeciesController@form');
Route::get('/updatedataspecies', 'SpeciesController@index');

Route::delete('delete-requestspecies/{id}', 'SpeciesController@delete');

