<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Project;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all project
        $u=User::find(3);
        $projects = Project::paginate(5);
        //dd($u->projects[0]->name);

        return view('admin.projects.index', compact('projects'));
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

        return view('admin.projects.add',compact('students', 'professors', 'categories'));
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
                'professor_id' => 'required',
                'status' => 'required',
                'grade' => 'required',
                'file' => 'required',
                'cover' => 'required',

            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            //Create project
            try {

            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);

            try {

                if ($request->cover) {
                    $image = Image::make($request->cover)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('cover/images/' . $request->cover->hashName(), (string)$image, 'public');
                    $request_data['cover'] = $request->cover->hashName();
                }//end of if


            } catch (Exception $e) {
                dd($e);

            }

            $student_id =request('student_id');
                $project = Project::create([
                    'name' => request('name'),
                    'category_id' => request('category_id'),
                    'user_id' => request('professor_id'),
                    'status' => request('status'),
                    'grade' => request('grade'),
                    'overview' => request('overview'),
                    'path' => $fileName,
                    'cover' => $request_data['cover'],
                ]);
                $project->save();

                $project->students()->syncWithoutDetaching($student_id);
            } catch (Exception $e) {
                dd($e);

            }


            return redirect()->route('admin.projects.index');


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
    public function show($id)
    {
        $project = Project::find($id);
        if ($project) {

            return json_encode([
                'message' => 'success',
                'project' => $project
            ]);
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
        return view('admin.projects.edit',compact('project', 'students', 'professors', 'categories'));
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


        try {
            $request_data['cover'] = $project->cover;
            if ($request->cover) {
                Storage::disk('public')->delete('cover/images/' . $project->cover);

                $image = Image::make($request->cover)
                    ->encode('jpg', 50);
                Storage::disk('public')->put('cover/images/' . $request->cover->hashName(), (string)$image, 'public');
                $request_data['cover'] = $request->cover->hashName();
            }//end of if


        } catch (Exception $e) {
            dd($e);

        }

        if ($project) {
            $project->update(['name' => request('name'),
            'category_id' => request('category_id'),
            'user_id' => request('professor_id'),
            'status' => request('status'),
            'grade' => request('grade'),
            'overview' => request('overview'),
            'cover' => $request_data['cover'],
            // 'path' => $fileName
            ]);

            $project->students()->sync(request()->student_id);
        return redirect()->route('admin.projects.index');

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
            return redirect()->route('admin.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
