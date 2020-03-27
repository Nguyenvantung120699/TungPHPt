<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Student;


class StudentController extends BaseController
{

    public function student(){
        $student = Student::all();
        return view('student.students.index',['student'=>$student]);
    }

    public function studentCreate(){
        return view('student.students.create');
    }

    public function studentStore(Request $request){
        $request->validate([
            "student_name" =>"required|string|unique:student",
            "age" => "required|string",
            "telephone" => "required|string",
            "classRoom" => "required|string",
            "total_mark" => "required|string"
        ]);

        try {
            Student::create([
                "student_name" => $request->get("student_name"),
                "age" => $request->get("age"),
                "telephone" => $request->get("telephone"),
                "classRoom" => $request->get("classRoom"),
                "total_mark" => $request->get("total_mark"),

            ]);
        }catch (\Exception $e){
            dd($e);
            return redirect()->back();
        }
        return redirect()->to("student/student");
    }


    public function studentEdit($id){
        $student = Student::find($id);
        return view('student.students.edit',['student'=>$student]);
    }
    public function studentUpdate($id,Request $request){
       $student = Student::find($id);
       $request->validate([
        "student_name" =>"required|string:student,student_name,".$id,
        "age" => "required|string",
        "telephone" => "required|string",
        "classRoom" => "required|string",
        "total_mark" => "required|string"
    ]);

    try {
        $student->update([
            "student_name" => $request->get("student_name"),
            "age" => $request->get("age"),
            "telephone" => $request->get("telephone"),
            "classRoom" => $request->get("classRoom"),
            "total_mark" => $request->get("total_mark")

        ]);
    }catch (\Exception $e){
        return redirect()->back();
    }
    return redirect()->to("student/student");
    }


    public function studentDestroy($id){
        $student = Student::find($id);
        try {
            $student->delete();
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("student/student");
    }
}