<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Collegue;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectComment;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->count();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->count();
        $projects = Project::whereHas('projectForm', function($q){
            return $q->where('status','like','completed');
        })->count();
        $collegues=Collegue::all()->count();
        $categories=Category::all()->count();
        $comments=ProjectComment::all()->count();

        return view('admin.dashboard.index', compact('students','professors','projects', 'collegues', 'categories', 'comments'));
    }
}
