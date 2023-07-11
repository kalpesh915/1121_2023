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
Route::post("/addprocess", [databaseController::class, 'addNewStudent']);
Route::get("/viewdata", [databaseController::class, 'viewAllData']);
Route::get("deletedata/{id?}", [databaseController::class, 'deleteData']);
Route::get("/getdataforedit/{id?}", [databaseController::class, 'getDataForEdit']);
Route::post("/updateprocess/{id?}",  [databaseController::class, 'updateProcess']);