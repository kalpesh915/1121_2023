<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    //
    public function index(Request $request){
        //return $request->input();
        session()->flash("fname", "Welcome ".$request->input("fname"));
        return redirect("home");
    }
}
