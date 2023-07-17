<?php

use App\Http\Controllers\databaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/getalldata", [databaseController::class, 'getAllData']);
Route::get("/getdata/{id?}", [databaseController::class, 'getData']);
Route::get("/searchdata/{fname?}", [databaseController::class, 'searchData']);
Route::post("/addnewdata", [databaseController::class, 'addNewData']);
Route::put("/updatedata/{id?}", [databaseController::class, 'updateData']);
Route::delete("/deletedata/{id?}", [databaseController::class, 'deleteData']);