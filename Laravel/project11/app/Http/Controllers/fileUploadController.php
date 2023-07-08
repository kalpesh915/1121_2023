<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileUploadController extends Controller
{
    //
    public function uploadProcess(Request $request){
        //return $request->file("file1")->store("data");
        return $request->file("file1")->storeAs("uploads", $request->file("file1")->getClientOriginalName());
    }
}
