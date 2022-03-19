<?php

namespace App\Http\Controllers\Professor;

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
        $this->middleware(['role:Professor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
            $q0->whereHas("collegue", function ($q) {
                $q->whereHas("professors", function ($q2) {
                    $q2->where("user_id", Auth::user()->id);
                });
            });
        })->where('professorSupervisor', Auth::user()->id)->paginate(5);

        if ($projectForms->count() > 0) {
            return view('professor.projectForms.index', compact('projectForms'));
        }

        if (Auth::user()->hasRole('Dean')) {
            $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
                $q0->whereHas("collegue", function ($q) {
                    $q->whereHas("professors", function ($q2) {
                        $q2->where("user_id", Auth::user()->id);
                    });
                });
            })->where('status', 'pending3')->paginate(5);
        } elseif (Auth::user()->hasRole('ViceDean')) {

            $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
                $q0->whereHas("collegue", function ($q) {
                    $q->whereHas("professors", function ($q2) {
                        $q2->where("user_id", Auth::user()->id);
                    });
                });
            })->where('status', 'pending2')->paginate(5);
        } elseif (Auth::user()->hasRole('HeadOfDepartment')) {

            $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
                $q0->whereHas("collegue", function ($q) {
                    $q->whereHas("professors", function ($q2) {
                        $q2->where("user_id", Auth::user()->id);
                    });
                });
            })->where('status', 'pending1')->paginate(5);
        } else {
            $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
                $q0->whereHas("collegue", function ($q) {
                    $q->whereHas("professors", function ($q2) {
                        $q2->where("user_id", Auth::user()->id);
                    });
                });
            })->where('status', 'approved')->paginate(5);
        }
        //get all projectForm
        //dd($projectForms->first()->title);

        return view('professor.projectForms.index', compact('projectForms'));
    }

    public function incomplete()
    {

        $projectForms = ProjectForm::whereHas("studentsForm", function ($q0) {
            $q0->whereHas("collegue", function ($q) {
                $q->whereHas("professors", function ($q2) {
                    $q2->where("user_id", Auth::user()->id);
                });
            });
        })->where('status', 'incompleted')->paginate(5);
        return view('professor.projectForms.index', compact('projectForms'));

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
        return view('professor.projectForms.add', compact('students', 'professors', 'categories'));
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
            try {
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
        $categories = Category::get();
        return view('professor.projectForms.edit', compact('projectForm', 'students', 'professors', 'categories'));
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
            return redirect()->route('professor.projectForms.index');
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
            return redirect()->route('professor.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function professorApprove($id)
    {
        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            switch ($projectForm->status) {
                case 'pending':
                    $projectForm->status = "pending1";
                    break;
                case 'pending1':
                    $projectForm->status = "pending2";
                    break;
                case 'pending2':
                    $projectForm->status = "pending3";
                    break;

                default:
                    $projectForm->status = "approved";
                    break;
            }
            $projectForm->save();
            return redirect()->route('professor.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function makeEvent(Request $request, $id)
    {
        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            if ($projectForm->status == "incompleted") {
                $projectForm->status = "approved2";
            }
            else {
                $projectForm->status = "pending2";
            }
            $projectForm->date = $request->date;
            $projectForm->time = $request->time;
            $projectForm->location = $request->location;
            $projectForm->save();
            return redirect()->route('professor.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function reject($id)
    {
        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            $projectForm->status = 'rejected';
            $projectForm->save();
            return redirect()->route('professor.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }

    public function reject_message($id)
    {
        $projectForm = ProjectForm::find($id);
        if ($projectForm) {
            $projectForm->status = 'rejected';
            $projectForm->reject_message = request()->reject_message;
            $projectForm->save();
            return redirect()->route('professor.projectForms.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
