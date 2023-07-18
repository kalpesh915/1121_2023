<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class databaseController extends Controller
{
    // get data API
    public function getData()
    {
        $studentData = student::all();
        return response(["students" => $studentData], 200);
    }

    // search data from table with get API
    public function searchData($id = 0)
    {
        if ($id === 0) {
            $studentData = student::all();
            return response(["students" => $studentData], 200);
        } else {
            $studentData = student::find($id);
            if ($studentData === null) {
                return response(["error" => "Invalid ID $id"], 200);
            } else {
                return response(["students" => $studentData], 200);
            }
        }
    }

    // add new data (post) API
    /* public function addNewData(Request $request){
        $student = new student();
        $student->fname = $request->input("fname");
        $student->lname = $request->input("lname");
        $student->email = $request->input("email");
        $student->phone = $request->input("phone");
        $student->city = $request->input("city");
        $student->gender = $request->input("gender");

        $student->save();

        return response(["message"=>"New Record Created"], 200);
    } */


    //  add new data with validation
    public function addNewData(Request $request)
    {
        $rules = array(
            "fname" => "required",
            "lname" => "required",
            "email" => "required|max:30|unique:students,email",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response(["error" => $validator->errors()], 404);
        } else {
            $student = new student();
            $student->fname = $request->input("fname");
            $student->lname = $request->input("lname");
            $student->email = $request->input("email");
            $student->phone = $request->input("phone");
            $student->city = $request->input("city");
            $student->gender = $request->input("gender");

            $student->save();

            return response(["message" => "New Record Created"], 200);
        }
    }


    public function updateData($id = 0, Request $request)
    {
        if ($id == 0) {
            return response(["error" => "ID is Required "], 200);
        } else {
            $studentData = student::find($id);

            if ($studentData === null) {
                return response(["error" => "invalid ID $id to Updatedata"], 200);
            } else {
                $studentData->fname = $request->input("fname");
                $studentData->lname = $request->input("lname");
                $studentData->email = $request->input("email");
                $studentData->phone = $request->input("phone");
                $studentData->city = $request->input("city");
                $studentData->gender = $request->input("gender");

                $studentData->save();

                return response(["success" => "Data Updated"], 200);
            }
        }
    }

    // delete data
    public function deleteData($id = 0)
    {
        if ($id === 0) {
            return response(["error" => "Id required to delete data"], 200);
        } else {
            $studentData = student::find($id);

            if ($studentData !== null) {
                $studentData->delete();
                return response(["message" => "data deleted with id $id"], 200);
            } else {
                return response(["message" => "no data found with id $id"], 200);
            }
        }
    }
}
