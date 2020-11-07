<?php

use TreeRemoval\Http\Controllers\TreeRemovalController;

Route::get('/home', [TreeRemovalController::class, 'home'])->name('treeremoval.home');