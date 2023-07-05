<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class databaseController extends Controller
{
    //
    public function index(){
        //return DB::select("select * from students");

        return student::all();
    }

    public function viewProducts(){
        $URL = "https://dummyjson.com/products";
        $productdata = Http::get($URL);
        return view("products", ["products"=>$productdata["products"]]);
    }
}
