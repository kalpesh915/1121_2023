<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class databaseController extends Controller
{
    // find all data
    /*public function getAllData(){
        //return student::all();

        $studentData = student::all();

        return response($studentData, 200);
    }*/

    function getData($id = 0){
        if($id == 0){
            $studentData = student::all();
            return response($studentData, 200);
        }else{
            $studentData = student::find($id);

            if($studentData !== null){
                return response($studentData, 200);
            }else{
                return response(["message"=>"Invalid ID $id"], 404);
            }
        }
    }

    function addNewData(Request $request){
        $student = new student();
        $student->fname = $request->input("fname");
        $student->lname = $request->input("lname");
        $student->email = $request->input("email");
        $student->phone = $request->input("phone");
        $student->city = $request->input("city");
        $student->gender = $request->input("gender");

        $student->save();

        return response(["message"=> "New data inserted"], 200);
    }

    function searchData($fname){
        return student::where("fname", "like", "%".$fname."%")->get();
    }

    function updateData($id=0, Request $request){
        if($id == 0){
            return response(["error" => "Invalid ID to update data"], 200);
        }else{
            // check data is exist or not
            $studentData = student::find($id);

            if($studentData === null){
                return response(["error" => "Invalid ID to update data"], 200);
            }else{
                $studentData->fname = $request->input("fname");
                $studentData->lname = $request->input("lname");
                $studentData->email = $request->input("email");
                $studentData->phone = $request->input("phone");
                $studentData->city = $request->input("city");
                $studentData->gender = $request->input("gender");
                $studentData->save();

                return response(["message"=>"Data Updated"], 200);
            }
        }
    }

    function deleteData($id = 0){
        if($id === 0){
            return response(["message" => "invalid ID to delete data"], 200);
        }else{
            $studentData = student::find($id);

            if($studentData !== null){
                $studentData->delete();
                return response(["message" => "Data Deleted with ID $id"], 200);
            }else{
                return response(["message" => "invalid ID to delete data"], 200);
            }
        }
    }
}
