<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {


        $projects = ProjectForm::where('status','like','completed')->where('student',Auth::user()->id)->count();
        // dd($projects); 
        $projects2 = ProjectForm::where('status','<>','completed')->where('student',Auth::user()->id)->count();
        $projects3 = ProjectForm::where('status','like','rejected')->where('student',Auth::user()->id)->count();
        return view('student.dashboard.index', compact('projects', 'projects2', 'projects3'));
    }
}
