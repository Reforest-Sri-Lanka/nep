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
    //dd(\Illuminate\Support\Facades\Auth::user());
    return view('home');
})->middleware(['auth', 'verified']);

Route::get('/roles', [RoleController::class, 'fetchAllRoles']);
Route::get('/arole', [RoleController::class, 'fetchARole']);