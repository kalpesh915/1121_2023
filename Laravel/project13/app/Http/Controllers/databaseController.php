<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class databaseController extends Controller
{
    //
    public function addNewStudent(Request $request){
        //return $request->input();
        $student = new student();

        $student->fname = $request->input("fname");
        $student->lname = $request->input("lname");
        $student->city = $request->input("city");
        $student->phone = $request->input("phone");
        $student->email = $request->input("email");
        $student->gender = $request->input("gender");

        $student->save();

        session()->flash("msg", "New Record Inserted");
        return redirect("/");
    }


    public function viewAllData(){
        $studentData = student::all();
        return view("viewdata", ["studentsdata"=>$studentData]);
    }

    public function deleteData($id = 0){
        if($id == 0){
            session()->flash("error", "invalid Roll No. to delete data");
        }else{
            $studentData = student::find($id);

            if($studentData === null){
                session()->flash("error", "invalid Roll No. to delete data");
            }else{
                $studentData->delete();
                session()->flash("msg", "Data Deleted with $id Roll Number");
            }
        }

        return redirect("/viewdata");
    }

    public function getDataForEdit($id = 0){
        if($id == 0){
            session()->flash("error", "invalid Roll No. to Edit data");
            return redirect("/viewdata");    
        }else{
            $studentData = student::find($id);

            if($studentData === null){
                session()->flash("error", "invalid Roll No. to Edit data");
                return redirect("/viewdata");
            }else{
                return view("editdata", ["studentData" => $studentData]);
            }
        }
    }

    public function updateProcess($id = 0, Request $request){
        if($id == 0){
            session()->flash("error", "invalid Roll No. to Edit data");
            return redirect("/viewdata");    
        }else{
            $studentData = student::find($id);

            if($studentData === null){
                session()->flash("error", "invalid Roll No. to Edit data");
                return redirect("/viewdata");
            }else{
               $studentData["fname"] = $request->input("fname");
               $studentData["lname"] = $request->input("lname");
               $studentData["email"] = $request->input("email");
               $studentData["phone"] = $request->input("phone");
               $studentData["city"] = $request->input("city");
               $studentData["gender"] = $request->input("gender");
               $studentData->save();

               session()->flash("msg", "Data updated Successfully");
               return redirect("/viewdata");
            }
        }
    }
}
