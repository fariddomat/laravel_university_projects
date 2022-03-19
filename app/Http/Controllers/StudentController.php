<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->paginate(8);

        return view('home.students', compact('students'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->find($id);

        // dd($student->projects);
        if ($student) {

            return view('home.student', compact('student'));

        } else
            return view('404');
    }


}
