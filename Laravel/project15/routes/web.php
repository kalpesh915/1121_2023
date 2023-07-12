<?php

use App\Http\Controllers\databaseController;
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

Route::get("/getalldata", [databaseController::class, 'getAllData']);
Route::get("/finddata", [databaseController::class, 'findData']);
Route::get("/countdata", [databaseController::class, 'countData']);
Route::get("/adddata", [databaseController::class, 'addData']);
Route::get("/updatedata", [databaseController::class, 'updateData']);
Route::get("/deletedata", [databaseController::class, 'deleteData']);
Route::get("/aggregation", [databaseController::class, "aggregation"]);

