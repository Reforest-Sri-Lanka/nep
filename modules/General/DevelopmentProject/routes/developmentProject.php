<?php

use DevelopmentProject\Http\Controllers\DevelopmentProjectController;

Route::get('/home', [DevelopmentProjectController::class, 'home'])->name('developmentproject.home');

Route::get('/check', [DevelopmentProjectController::class, 'test']);