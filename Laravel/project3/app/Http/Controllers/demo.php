<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demo extends Controller
{
    //
    function getAbout(){
        return view("about");
    }
}
