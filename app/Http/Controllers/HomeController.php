<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            return redirect()->route('admin.dashboard.index');
        } else
        if (Auth::user()->hasRole('Professor')) {
            return redirect()->route('professor.dashboard.index');
        } else {
            return redirect()->route('student.dashboard.index');
        }

        return view('home');
    }
}
