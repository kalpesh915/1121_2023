<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SanctumController extends Controller
{
    //

    public function index(Request $request){
        // get user from users table
        $user = User::where("email", $request->input("email"))->first();

        // check user is exist and password is valid or not
        if(!$user || !Hash::check($request->input("password"), $user->password)){
            return response(["error" => "Invalid username or password "], 404);
        }else{
            $token = $user->createToken('demo')->plainTextToken;
            $response = ['User' => $user, "token" => $token];

            return response(["response" => $response], 200);
        }
    }

    public function getData(){
        return response(["success" => "Data Inserted Successfully"], 200);
    }

    public function updateData(){
        return response(["success" => "Data updated Successfully"], 200);
    }

    public function deleteData(){
        return response(["success" => "Data Deleted Successfully"], 200);
    }
}
