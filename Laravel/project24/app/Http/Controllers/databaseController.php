<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class databaseController extends Controller
{
    //
    public function index(Request $request){
        $user = User::where("email", $request->input("email"))->first();

        if(!$user | !Hash::check($request->input("password"), $user->password)){
            return response(["error" => "Invalid Username or Password"], 404);
        }else{
            $token = $user->createToken('demo-token')->plainTextToken;
            $userdata = ["user"=>$user, "token"=>$token];
            return response(["userdata" => $userdata], 200);
        }
    }

    public function getData(){
        return response(["message" => "get Data Called"]);
    }

    public function setData(){
        return response(["message" => "set Data Called"]);
    }

    public function updateData(){
        return response(["message" => "update Data Called"]);
    }

    public function deleteData(){
        return response(["message" => "Delete Data Called"]);
    }

    public function uploadFile(Request $request){
        //return $request->file("file1")->store();
        return $request->file("file1")->storeAs("images", $request->file("file1")->getClientOriginalName());
    }
}
