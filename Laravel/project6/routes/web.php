<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view("/", "welcome")->middleware("example1");
Route::group(["middleware"=>["demo1"]], function(){
    Route::view("/about", "about");
    Route::view("/feedback", "feedback");
    Route::view("/contact", "contact");

});
Route::view("/login", "login")->middleware("example1");
Route::view("/urlexample", "urlexample");