<?php

use App\Http\Controllers\SanctumController;
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
Route::post("/login", [SanctumController::class, 'index']);

Route::group(["middleware" => "auth:sanctum"], function(){
    Route::get("/getdata", [SanctumController::class, 'getData']);
    Route::get("/updatedata", [SanctumController::class, 'updateData']);
    Route::get("/deletedata", [SanctumController::class, 'deleteData']);
});
