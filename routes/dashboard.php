<?php

Route::get('/foo', fn() => view('dashboard::index'));

Route::get('/test', fn() => view('dashboard::test'));
