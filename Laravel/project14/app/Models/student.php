<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    // disable timestamp from insert or update
    public $timestamps = false;
    use HasFactory;
}
