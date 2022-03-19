<?php

namespace App\Http\Controllers\Professor;

use App\Category;
use App\Http\Controllers\Controller;
use App\Project;
use App\ProjectForm;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
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
        $u = User::find(3);
        $projects = Project::whereHas('projectForm', function($q){
            $q->where('professorSupervisor', Auth::user()->id);
        })->paginate(5);


        //  dd($projects->first()->projectForm);

        return view('professor.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->get();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->get();
        $categories=Category::get();

        return view('professor.projects.add', compact('students', 'professors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = "";
        try {
            //Validate input
            $validator =  Validator::make($request->all(), [
                'name' => 'required',
                'category_id' => 'required',
                'student_id' => 'required',
                'status' => 'required',
                'grade' => 'required',
                'file' => 'required',
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            //Create project
            try {

            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);

            $student_id =request('student_id');
                $project = Project::create([
                    'name' => request('name'),
                    'category_id' => request('category_id'),
                    'user_id' => Auth::user()->id,
                    'status' => request('status'),
                    'grade' => request('grade'),
                    'overview' => request('overview'),
                    'path' => $fileName
                ]);
                $project->save();

                $project->students()->syncWithoutDetaching($student_id);
            } catch (Exception $e) {
                dd($e);

            }


            return redirect()->route('professor.projects.index');


        } catch (Exception $e) {
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'error',
                    $validator->messages()
                ], Response::HTTP_BAD_REQUEST);
            }
        } finally { }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        $project = Project::whereHas('projectForm', function($q) use($id){
            $q->where('professorSupervisor', Auth::user()->id);
        })->where('id',$id)->get()->first();
        // dd($project);
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->get();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->get();
        $categories = Category::get();

        if ($project) {

            return view('professor.projects.edit', compact('project', 'students', 'professors', 'categories'));
        } else
            return response()->json(['message' => 'error'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Project::find($id);
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->get();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->get();
        $categories=Category::get();
        return view('professor.projects.edit',compact('project', 'students', 'professors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

// $fileName = time().'.'.$request->file->extension();
        // $request->file->move(public_path('uploads'), $fileName);

        //dd( request('overview'));

        $project = Project::find($id);
        if ($project) {
            $project->update(['name' => request('name'),
            'category_id' => request('category_id'),
            'user_id' => request('professor_id'),
            'status' => request('status'),
            'grade' => request('grade'),
            'overview' => request('overview'),
            // 'path' => $fileName
            ]);
            $project->students()->sync(request()->student_id);
        return redirect()->route('professor.projects.index');

        } else
            return response()->json(['message' => 'error'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $project = Project::find($id);
        if ($project) {
            $project->delete();
            $project->students()->sync([]);
            return redirect()->route('professor.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function complete($id)
    {

        $project=Project::find($id);
        $projectForm = ProjectForm::wherehas('Project', function($q) use ($id){
            $q->where('id',$id);
        })->first();
        if ($project) {
            $project->update([
                'grade' => request('grade')
            ]);
            $projectForm->update([
                'status' => 'completed',
            ]);

            return redirect()->route('professor.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function incomplete($id)
    {
        $project=Project::find($id);
        $projectForm = ProjectForm::wherehas('Project', function($q) use ($id){
            $q->where('id',$id);
        })->first();
        if ($project) {
            $project->update([
                'grade' => '0'
            ]);
            $projectForm->update([
                'status' => 'incompleted',
            ]);

            return redirect()->route('professor.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function reject($id)
    {

        $project=Project::find($id);
        $projectForm = ProjectForm::wherehas('Project', function($q) use ($id){
            $q->where('id',$id);
        })->first();
        if ($project) {
            $project->update([
                'grade' => '0'
            ]);
            $projectForm->update([
                'status' => 'rejected',
            ]);

            return redirect()->route('professor.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
