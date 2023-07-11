<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class databaseController extends Controller
{
    //
    public function getAllData(){
        $studentData = student::all();
        return view("viewalldata", ["studentdata" => $studentData]);
    }

    public function getPaginatedData(){
        $studentData = student::paginate(10);
        return view("viewpaginatedata", ["studentdata" => $studentData]);
    }
}
