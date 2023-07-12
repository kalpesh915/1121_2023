<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class databaseController extends Controller
{
    //
    public function getAllData(){
        return DB::table("students")->get();
    }

    public function findData(){
        //return DB::table("students")->where("id", 5)->get();
        return DB::table("students")->find(5);
    }

    public function countData(){
        //return DB::table("students")->where("fname", "hardik")->get()->count();
        return DB::table("students")->count();
    }

    public function addData(){
        return DB::table("students")->insert([
            "fname" => "Poonam",
            "lname" => "Rathod",
            "email" => "Poonam@gmail.com",
            "phone" => "9876543210",
            "city" => "Rajkot",
            "gender" => "Female"
        ]);
    }

    public function updateData(){
        return DB::table("students")->where("id", 7)->update([
            "fname" => "Poonam",
            "lname" => "Rathod",
            "email" => "Poonam@gmail.com",
            "phone" => "8899776677",
            "city" => "Jamnagar",
            "gender" => "Female"
        ]);
    }

    public function deleteData(){
        return DB::table("students")->where("id", 7)->delete();
    }

    public function aggregation(){
        echo "<hr>".DB::table("students")->sum("id");
        echo "<hr>".DB::table("students")->max("id");
        echo "<hr>".DB::table("students")->min("id");
        echo "<hr>".DB::table("students")->avg("id");
        echo "<hr>".DB::table("students")->count("id");
    }
}
