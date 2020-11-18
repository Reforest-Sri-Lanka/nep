<?php

use EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController;

Route::get('/envRestoration/index', 'EnvironmentRestorationController@index');

Route::get('/envRestoration/show/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@show');

Route::get('/envRestoration/edit/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@edit');

Route::patch('/envRestoration/update/{id}', 'Modules\General\EnvironmentRestoration\Http\Controllers\EnvironmentRestorationController@update');

Route::get('/envRestoration/create', function () {
         return view('envRestoration/envRestorationCreate');
     });

Route::post('/envRestoration/store', 'App\Http\Controllers\envRestorationController@store'); 
