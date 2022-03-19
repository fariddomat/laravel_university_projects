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

class ProjectFormController extends Controller
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
        //get all projectForm
        $projectForms1 = Auth::user()->projectForm()->get();
        $projectForms2 =ProjectForm::where('studentPartner','like',"%,".Auth::user()->id.",%")->get();
        $projectForms=$projectForms1->merge($projectForms2)->paginate(5);
        //dd($projectForms->first()->title);

        return view('student.projectForms.index', compact('projectForms'));
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
        $categories=Category::all();
        return view('student.projectForms.add',compact('students', 'professors', 'categories'));
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
                'title' => 'required',
                'category_id' => 'required',
                'professorSupervisor' => 'required',
                'skills' => 'required',
                'goal' => 'required',
                'about' => 'required',
            ]);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            //Create projectForm
            // dd(request('student_id'));
            $students=",";
                foreach (request('student_id') as $key => $value) {
                   $students=$students.$value.",";
                //    dd($students);
                }

            try {
                $projectForm = ProjectForm::create([
                    'title' => request('title'),
                    'category_id' => request('category_id'),
                    'professorSupervisor' => request('professorSupervisor'),
                    'laboratorySupervisor' => request('laboratorySupervisor'),
                    'student' => Auth::user()->id,
                    'studentPartner' => $students,
                    'skills' => request('skills'),
                    'goal' => request('goal'),
                    'about' => request('about'),
                    'status' => 'pending',
                ]);


                $projectForm->save();

            } catch (Exception $e) {
                dd($e);

            }


            return redirect()->route('student.projectForms.index');


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
        $projectForm = ProjectForm::find($id);
        if ($projectForm) {

            return json_encode([
                'message' => 'success',
                'projectForm' => $projectForm
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

        $projectForm = ProjectForm::find($id);
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->get();
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->get();
        $categories=Category::get();
        return view('student.projectForms.edit',compact('projectForm', 'students', 'professors', 'categories'));
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


        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            $projectForm->update(request()->all());
            $projectForm->update([
                'status'=>'pending'
            ]);
        return redirect()->route('student.projectForms.index');

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

        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            $projectForm->delete();
            return redirect()->route('student.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
