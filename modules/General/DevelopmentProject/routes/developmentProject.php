<?php

use DevelopmentProject\Http\Controllers\DevelopmentProjectController;

Route::get('/home', [DevelopmentProjectController::class, 'home']);


Route::get('/test', function(){
    return view('developmentProject::index');
});