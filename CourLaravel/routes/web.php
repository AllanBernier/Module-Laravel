<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::resource("blog", BlogController::class);


Route::get('/', function () {
    return view('welcome');
});
