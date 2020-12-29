<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
//use App\Http\Controllers\Crime_reportController;

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


/* Route::post('/crimecreate', [Crime_reportController::class, 'create_crime_report']);
Route::get('/crimehome', [Crime_reportController::class, 'crime_module_access_controller']);

Route::get('/newcrime', fn() => view('general.logComplaint'));
Route::get('/general', [Crime_reportController::class, 'general_view_display']);

Route::get('/trackcrime', [Crime_reportController::class, 'track_user_crime_reports']);
Route::get('/assigncheck', [Crime_reportController::class, 'track_assigned_process_items']);
Route::get('/crimeadmin', [Crime_reportController::class, 'display_all_new_process_items']);
Route::get('/assign/{id}',[Crime_reportController::class, 'load_crimeAssign']);
Route::get('/check/{id}',[Crime_reportController::class, 'load_crimeInvestigate']);

Route::get('/searchauth', [Crime_reportController::class, 'search_specific_authorities']);
Route::post('/assignauth', [Crime_reportController::class, 'assign_authorities_crimereport']);
Route::post('/treecutcreate', [Crime_reportController::class, 'create_tree_removal_request']);
Route::get('/newtreecut',fn() => view('general.treecutting.treecut')); */



Route::get('/search', [UserController::class, 'search']);
Route::get('/autocomplete', [UserController::class, 'autocomplete'])->name('autocomplete');

Route::get('/map', function(){
    return view('map');
});
