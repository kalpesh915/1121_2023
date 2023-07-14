<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public function getData(){
        //return "Welcome";
        return student::all();
    }

    public function setData(){
        $student = new student();

        $student->fname = "aayushi";
        $student->lname = "gadhiya";
        $student->email = "aayushi@gmail.com";
        $student->phone = "9988998899";
        $student->city = "Surat";
        $student->gender = "female";

        $student->save();
    }

    public function one2one(){
        //echo "Welcome";
        //return student::find(1)->getAttendance;
        return student::find(3)->getExams;
    }
}
