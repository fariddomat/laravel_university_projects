<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use App\Category;
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

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Student']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all project
        $projects = Auth::user()->projects()->paginate(5);
        $projectForms = Auth::user()->projectForm()->paginate(5);

        //dd($projectForms);
        return view('student.projects.index', compact('projects', 'projectForms'));
    }

    public function incomplete()
    {

        $projectForms = Auth::user()->projectForm()->where('status', 'approved2')->paginate(5);
        //dd($projectForms);
        return view('student.projects.index', compact('projectForms'));
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
        $categories = Category::all();
        return view('student.projects.add', compact('students', 'professors', 'categories'));
    }

    public function store_new(Request $request)
    {


        // dd($request->code->extension());
        $validator =  Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'professorSupervisor' => 'required',
            'skills' => 'required',
            'goal' => 'required',
            'about' => 'required',
            'file' => 'required',
            'ppt' => 'required',
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }



            $cover="";
            try {
                if ($request->cover) {
                    $image = Image::make($request->cover)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('cover/images/' . $request->cover->hashName(), (string) $image, 'public');
                    $cover = $request->cover->hashName();
                } //end of if
            } catch (\Throwable $th) {
                //throw $th;
            }


            if ($request->file) {
                $fileName = time() . '.' . $request->file->getClientOriginalExtension();
                // dd($request->file->getClientOriginalExtension());
                $request->file->move(public_path('uploads\docs'), $fileName);
            }

            if ($request->ppt) {
                $ppt = time() . '.' . $request->ppt->getClientOriginalExtension();
                $request->ppt->move(public_path('uploads\ppt'), $ppt);
            }
            if ($request->code) {
                $code = time() . '.' . $request->code->getClientOriginalExtension();
                $request->code->move(public_path('uploads\code'), $code);
            }
            $host="";
            if ($request->host) {
                $host=$request->host;
            }
            $github="";
            if ($request->github) {
                $github = $request->github;
            }

            $projectForm = ProjectForm::create([
                'title' => request('title'),
                'category_id' => request('category_id'),
                'professorSupervisor' => request('professorSupervisor'),
                'laboratorySupervisor' => request('laboratorySupervisor'),
                'student' => Auth::user()->id,
                'studentPartner' => request('studentPartner'),
                'skills' => request('skills'),
                'goal' => request('goal'),
                'about' => request('about'),
                'status' => 'published',

            ]);
            // dd($request->github);
            $project = Project::create([
                'path' => $fileName,
                'cover' => $cover,
                'ppt' => $ppt,
                'code' => $code,
                'host' => $host,
                'github' => $github,
                'project_form_id' => $projectForm->id
            ]);
            $project->save();

            // $project->students()->syncWithoutDetaching($student_id);
            $project->students()->syncWithoutDetaching([Auth::user()->id]);
            $project->students()->syncWithoutDetaching(request('student_id'));

            return redirect()->route('student.projects.index');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $host="";
        $github="";
        $pp = Project::where('project_form_id', $request->project_forms_id)->first();
        if ($pp) {
            $fileName = $pp->path;
            $ppt = $pp->ppt;
            $cover = $pp->cover;
            $code = $pp->code;
            $github = $pp->github;
            $host = $pp->host;
            $pp->delete();
            $pp->students()->sync([]);
        } else {
            $validator = "";
            //Validate input
            $validator =  Validator::make($request->all(), [

                'file' => 'required',
                'ppt' => 'required',
                'code' => 'required',
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
        }

        try {


            //Create project
            try {
                $cover="";
               try {
                if ($request->cover) {
                    $image = Image::make($request->cover)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('cover/images/' . $request->cover->hashName(), (string) $image, 'public');
                    $cover = $request->cover->hashName();
                } //end of if
               } catch (\Throwable $th) {
                   //throw $th;
               }

                if ($request->file) {
                    $fileName = time() . '.' . $request->file->getClientOriginalExtension();
                    $request->file->move(public_path('uploads\docs'), $fileName);
                }

                if ($request->ppt) {
                    $ppt = time() . '.' . $request->ppt->getClientOriginalExtension();
                    $request->ppt->move(public_path('uploads\ppt'), $ppt);
                }
                if ($request->code) {
                    $code = time() . '.' . $request->code->getClientOriginalExtension();
                    $request->code->move(public_path('uploads\code'), $code);
                }
                if ($request->host) {
                    $host=$request->host;
                }
                if ($request->github) {
                    $github = $request->github;
                }

                // dd($request->github);
                $project = Project::create([
                    'path' => $fileName,
                    'cover' => $cover,
                    'ppt' => $ppt,
                    'code' => $code,
                    'host' => $host,
                    'github' => $github,
                    'project_form_id' => $request->project_forms_id
                ]);
                $project->save();

                // $project->students()->syncWithoutDetaching($student_id);
                $project->students()->syncWithoutDetaching([Auth::user()->id]);

                $projectForm = ProjectForm::find($request->project_forms_id);

                foreach(explode(',',$projectForm->studentPartner) as $row)
                    if($row!="")
                    $project->students()->syncWithoutDetaching([$row]);

                if ($projectForm->status=="approved2") {
                    $projectForm->status = "published2";
                }else {
                    $projectForm->status = "published";
                }
                $projectForm->save();
            } catch (Exception $e) {
                dd($e);
            }


            return redirect()->route('student.projects.index');
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

        $project = ProjectForm::find($id);
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->get();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->get();
        $categories = Category::get();
        return view('student.projects.edit', compact('project', 'students', 'professors', 'categories'));
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


        $project = Project::find($id);
        if ($project) {
            $project->update(request()->all());

            $project->students()->sync(request()->student_id);
            $project->students()->syncWithoutDetaching([Auth::user()->id]);
            return redirect()->route('student.projects.index');
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
            return redirect()->route('student.projects.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
