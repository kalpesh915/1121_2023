<?php

use App\Http\Controllers\databaseController;
use Illuminate\Support\Facades\Blade;
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

Route::get('/', function () {
    return view('welcome');
});


/* Route::get("/getdata", [databaseController::class, 'getData']);
Route::get("/setdata", [databaseController::class, 'setData']);
Route::get("/updatedata", [databaseController::class, 'updateData']);
Route::get("/deletedata", [databaseController::class, 'deleteData']);

*/

// Controlled Route Group

Route::controller(databaseController::class)->group(function(){
   Route::get("/getdata", "getData"); 
   Route::get("/setdata", "setData"); 
   Route::get("/updatedata", "updateData"); 
   Route::get("/deletedata", "deleteData"); 
});

// Route::view("/error", "error");

/*Route::get("/error", function(){
    return Blade::render("<h1>New Error Page</h1>");
});*/

Route::get("/error", function(){
    $year = 2023;
    return Blade::render("Welcome to $year", ["year"=>$year]);
});