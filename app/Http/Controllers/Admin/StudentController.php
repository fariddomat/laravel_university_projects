<?php

namespace App\Http\Controllers\Admin;

use App\Collegue;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
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
        //get all student
        $students = User::whereHas("roles", function ($q) {
            $q->where("name", "Student");
        })->latest()->paginate(5);
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $collegues=Collegue::get();
        return view('admin.students.add', compact('collegues'));
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
                'email' => 'required|email',
                'Firstname' => 'required',
                'Lastname' => 'required',
                'password' => 'required',
                'RegYeer' => 'required',
                'Gender' => 'required',
                'Address' => 'required',
                'mobileNo' => 'required|regex:/(09)[0-9]{8}/',
                'collegue_id' => 'required',
                'img_path' => 'required',
            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            try {

                if ($request->img_path) {
                    $image = Image::make($request->img_path)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string)$image, 'public');
                    $request_data['img_path'] = $request->img_path->hashName();
                }//end of if


            } catch (Exception $e) {
                dd($e);

            }

            //Create Student
            $student = User::create([
                'email' => request('email'),
                'Firstname' => request('Firstname'),
                'Lastname' => request('Lastname'),
                'password' => bcrypt(request('password')),
                'RegYeer' => request('RegYeer'),
                'Gender' => request('Gender'),
                'Address' => request('Address'),
                'mobileNo' => request('mobileNo'),
                'About' => request('About'),
                'github' => request('github'),
                'linkedin' => request('linkedin'),
                'collegue_id' => request('collegue_id'),
                'img_path' => $request_data['img_path'],



            ]);

            //assign student Role

            $role = Role::findByName('Student');
            $student->assignRole($role);

            return redirect()->route('admin.students.index');


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
        $student = User::find($id);
        if ($student) {

            return json_encode([
                'message' => 'success',
                'student' => $student
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

        $student = User::find($id);
        $collegues=Collegue::get();

        return view('admin.students.edit',compact('student', 'collegues'));
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



        $student = User::find($id);

        try {
            $request_data['img_path'] = $student->img_path;
            if ($request->img_path) {
                Storage::disk('public')->delete('images/' . $student->img_path);
                $image = Image::make($request->img_path)
                    ->encode('jpg', 50);
                Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string)$image, 'public');
                $request_data['img_path'] = $request->img_path->hashName();
            }//end of if


        } catch (Exception $e) {
            dd($e);

        }

        if ($student) {
            $student->update([
                'email' => request('email'),
                'Firstname' => request('Firstname'),
                'Lastname' => request('Lastname'),
                'password' => bcrypt(request('password')),
                'RegYeer' => request('RegYeer'),
                'Gender' => request('Gender'),
                'Address' => request('Address'),
                'mobileNo' => request('mobileNo'),
                'About' => request('About'),
                'github' => request('github'),
                'linkedin' => request('linkedin'),
                'collegue_id' => request('collegue_id'),
                'img_path' => $request_data['img_path'],

            ]);


        return redirect()->route('admin.students.index');

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

        $student = User::find($id);
        if ($student) {
            $student->delete();
            return redirect()->route('admin.students.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
