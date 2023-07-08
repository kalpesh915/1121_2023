<?php

use App\Http\Controllers\fileUploadController;
use Illuminate\Support\Facades\App;
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

Route::view("/file1", "fileupload");
Route::get("/about/{lang?}", function($lang = "en"){
    App::setlocale($lang);
    return view("about");
});
Route::post("/uploadprocess", [fileUploadController::class, 'uploadProcess']);