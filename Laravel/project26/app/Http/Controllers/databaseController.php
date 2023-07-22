<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class databaseController extends Controller
{
    //
    public function getData(){
        return "Get Data Called";
    }

    public function setData(){
        return "Set Data Called";
    }

    public function deleteData(){
        return "Delete Data Called";
    }

    public function updateData(){
        return "Update Data Called";
    }
}
