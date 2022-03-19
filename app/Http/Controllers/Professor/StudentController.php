<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Professor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all student
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->paginate(5);
        return view('professor.students.index', compact('students'));
    }
}
