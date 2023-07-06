<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function loginProcess(Request $request){
        $email = $request->input("email");
        $upass = $request->input("upass");

        if($email == "admin@project.com" && $upass == "admin"){
            session()->put("username", $email);
            return redirect("/home");
        }else{
            session()->flash("error", "Invalid Username or Password");
            return redirect("/");
        }
    }
}
