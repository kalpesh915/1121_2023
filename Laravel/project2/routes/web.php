<?php

use App\Http\Controllers\demo1;
use App\Http\Controllers\demo2;
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

Route::get("/msg", [demo1::class, "msg"]);
Route::get("/greetings", [demo2::class, "greetings"]);
Route::get("/printer/{fname?}", [demo2::class, 'printer']);
/*
    ? symbol in parameter list reresent paramter is not required
*/ 