<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfessorController extends Controller
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
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->paginate(8);

        return view('home.teachers', compact('professors'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->find($id);

        if ($professor) {

            return view('home.teacher', compact('professor'));

        } else
            return view('404');
    }


}
