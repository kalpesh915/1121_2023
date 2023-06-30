<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    //
    public function getFormProcess(Request $request){
        return $request->input();
    }
}
