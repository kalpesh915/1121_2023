<?php

use App\Http\Controllers\loginController;
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

Route::view("/", "login");
Route::post("/loginprocess", [loginController::class, 'loginProcess']);

Route::group(["middleware"=>["login"]], function(){
    Route::view("/home", "home");
    Route::view("/about", "about");
    Route::view("/feedback", "feedback");
    Route::view("/products", "products");
    Route::view("/contact", "contact");
    Route::get("/logout", function(){
        if(session()->has("username")){
            session()->pull("username");
            session()->flash("success", "Logout Successfully");
            return redirect("/");
        }else{
            session()->flash("error", "not Logged in");
            return redirect("/");
        }
    });
});



