<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectForm;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {


        $projects = ProjectForm::Where('professorSupervisor',Auth::user()->id)->get()->count();
        $students=User::whereHas('projectForm', function($q){
            return $q->where('professorSupervisor',Auth::user()->id);
        })->get()->count();
        return view('professor.dashboard.index', compact('projects', 'students'));
    }
}
