<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Crime_reportController;

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

/* Route::get('/general', function(){
    return view('test/mainview');
}); */

Route::get('/general', [Crime_reportController::class, 'general']);
Route::post('/crimecreate', [Crime_reportController::class, 'create']);
Route::get('/crimehome', [Crime_reportController::class, 'index2']);

Route::get('/newcrime', fn() => view('general.logComplaint'));
Route::get('/general', [Crime_reportController::class, 'general']);

Route::get('/trackcrime', [Crime_reportController::class, 'track']);
Route::get('/assigncheck', [Crime_reportController::class, 'track2']);
Route::get('/crimeadmin', [Crime_reportController::class, 'admin']);
Route::get('/assign/{id}',[Crime_reportController::class, 'show']);
Route::get('/check/{id}',[Crime_reportController::class, 'show2']);

Route::get('/searchauth', [Crime_reportController::class, 'searchauth']);
Route::post('/assignauth', [Crime_reportController::class, 'assignauth']);
Route::post('/treecutcreate', [Crime_reportController::class, 'create2']);
Route::get('/newtreecut',fn() => view('general.treecutting.treecut'));


//Route::get('/roles', [RoleController::class, 'fetchAllRoles']);
//Route::get('/arole', [RoleController::class, 'fetchARole']);
// Route::get('/lighthome', function () {
//     return view('test2');
// });
// Route::get('/dash', function () {
//     return view('test3');
// });