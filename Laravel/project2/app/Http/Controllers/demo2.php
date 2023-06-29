<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class demo2 extends Controller
{
    //
    public function greetings(){
        echo "<h1>Another Function from demo2 controller</h1>";
    }

    // set default value of uname to "" for make function callable when we not pass any value
    // or set a default value
    public function printer($uname="Rajkot"){
        echo "<h1>Welcome {$uname} to world of PHP Laravel</h1>";
    }
}
