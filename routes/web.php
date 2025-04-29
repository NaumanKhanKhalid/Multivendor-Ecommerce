<?php

use Illuminate\Support\Facades\Route;


require base_path('routes/frontend.php');

require base_path('routes/backend.php');

Route::get('/', function () {
    return view('welcome');
});


