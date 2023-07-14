<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class databaseController extends Controller
{
    //
    public function getData(){
        //return "Welcome";
        
        //return DB::table("students")->get();
        
        //return DB::table("students")->join("attendance", "students.id", "=", "attendance.student_id")->get();

        //return DB::table("students")->join("attendance", "students.id", "=", "attendance.student_id")->select(["*"])->get();

        //return DB::table("students")->join("attendance", "students.id", "=", "attendance.student_id")->select(["students.id", "students.fname", "students.lname", "students.email", "students.phone", "students.gender", "attendance.absents", "attendance.presents"])->get();

        //return DB::table("students")->join("attendance", "students.id", "=", "attendance.student_id")->select(["students.*", "attendance.absents", "attendance.presents"])->get();

        return DB::table("students")->join("attendance", "students.id", "=", "attendance.student_id")->select(["students.*", "attendance.absents", "attendance.presents"])->where("students.id", 5)->get();
    }
}
