<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    public $timestamps = false;
    // accessor function
    public function getFnameAttribute($fname){
        return strtoupper($fname);
    }

    public function getCityAttribute($city){
        return $city." (Gujarat, India)";
    }

    // mutators function

    public function setFnameAttribute($fname){
        return $this->attributes["fname"] = strtoupper($fname);
    }

    public function setLnameAttribute($lname){
        return $this->attributes["lname"] = strtoupper($lname);
    }

    public function getAttendance(){
        return $this->hasOne(attendance::class);
    }

    public function getExams(){
        return $this->hasMany(examinations::class);
    }
}
