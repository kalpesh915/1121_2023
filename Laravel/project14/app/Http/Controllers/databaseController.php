<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class databaseController extends Controller
{
    //
    public function addNewStudent(Request $request){
        DB::table("students")->insert([
            "fname" => $request->input("fname"),
            "lname" => $request->input("lname"),
            "email" => $request->input("email"),
            "phone" => $request->input("phone"),
            "city" => $request->input("city"),
            "gender" => $request->input("gender")
        ]);
        session()->flash("msg", "New Record Inserted");
        return redirect("/");
    }


    public function viewAllData(){
        $studentData = (array) DB::select("select * from students");
        return view("viewdata", ["studentsdata"=>$studentData]);
    }

    public function deleteData($id = 0){
        if($id == 0){
            session()->flash("error", "invalid Roll No. to delete data");
        }else{
            $studentData = DB::table("students")->find($id);

            if($studentData === null){
                session()->flash("error", "invalid Roll No. to delete data");
            }else{
                
                //DB::table("students")->delete($id);
                DB::table("students")->where("id", $id)->delete();
                session()->flash("msg", "Data Deleted");
            }
        }

        return redirect("/viewdata");
    }

    public function getDataForEdit($id = 0){
        if($id == 0){
            session()->flash("error", "invalid Roll No. to Edit data");
            return redirect("/viewdata");    
        }else{
            $studentData = DB::table("students")->find($id);

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
            $studentData = DB::table("students")->find($id);

            if($studentData === null){
                session()->flash("error", "invalid Roll No. to Edit data");
                return redirect("/viewdata");
            }else{
                DB::table("students")->where("id", $id)->update([
                    "fname" => $request->input("fname"),
                    "lname" => $request->input("lname"),
                    "email" => $request->input("email"),
                    "phone" => $request->input("phone"),
                    "city" => $request->input("city"),
                    "gender" => $request->input("gender")
                ]);

               session()->flash("msg", "Data updated Successfully");
               return redirect("/viewdata");
            }
        }
    }
}
