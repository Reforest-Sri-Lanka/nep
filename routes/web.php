<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/search', [UserController::class, 'search']);

Route::get('/autocomplete', [UserController::class, 'autocomplete'])->name('autocomplete');

Route::get('/map', function(){
    return view('map');
});
