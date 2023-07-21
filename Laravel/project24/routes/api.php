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

Route::post("/login", [databaseController::class, 'index']);

Route::group(["middleware" => 'auth:sanctum'], function(){
    Route::get("/getdata", [databaseController::class,'getdata']);
    Route::put("/updatedata", [databaseController::class,'updatedata']);
    Route::post("/setdata", [databaseController::class,'setdata']);
    Route::delete("/deletedata", [databaseController::class,'deletedata']);

    // file Upload API
    Route::post("/upload1", [databaseController::class, 'uploadFile']);
});

