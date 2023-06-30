<?php

use App\Http\Controllers\demo;
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

Route::get("/about", [demo::class, 'getAbout']);

Route::get('/blade1', function () {
    $students = ["Himanshu", "Hardik", "Poonam", "Kiran", "Aayushi", "Ronak"];
    return view('blade1', ["students"=>$students]);
});