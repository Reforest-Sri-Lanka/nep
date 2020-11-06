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

Route::get('/lighthome', function () {
    return view('test2');
});

Route::get('/dash', function () {
    return view('test3');
});

Route::get('/home', function () {
    //dd(\Illuminate\Support\Facades\Auth::user());
    return view('test/dashboard');
})->middleware(['auth', 'verified']);


Route::get('/admin', function(){
    return view('test/adminHome');
});

Route::get('/general', function(){
    return view('test/mainview');
});

//Route::get('/roles', [RoleController::class, 'fetchAllRoles']);
//Route::get('/arole', [RoleController::class, 'fetchARole']);
