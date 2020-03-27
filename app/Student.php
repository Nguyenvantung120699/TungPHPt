<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $table = 'student';

     protected $fillable = ['student_id',"student_name","age","telephone","classRoom","total_mark"];
}