<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard/login');
  	//return view('welcome');
});

Route::get('/pwa-entry', function () {
    return view('pwa.entry');
});
