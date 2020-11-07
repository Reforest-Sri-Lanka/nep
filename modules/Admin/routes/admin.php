<?php

use Admin\Http\Controllers\AdminController;

Route::get('/home', [AdminController::class, 'home'])->name('admin.home');