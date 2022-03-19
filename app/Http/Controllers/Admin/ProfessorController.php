<?php

namespace App\Http\Controllers\Admin;

use App\Collegue;
use App\Http\Controllers\Controller;
use App\ProfessorRole;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfessorController extends Controller
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
        //get all professor
        $professors = User::whereHas("roles", function ($q) {
            $q->where("name", "Professor");
        })->latest()->paginate(5);
        return view('admin.professors.index', compact('professors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $collegues = Collegue::get();
        $professor_roles = Role::all();

        // Ignore default Roles [Admin, Professor, Student]
        $professor_roles->forget([0, 1, 2]);
        return view('admin.professors.add', compact('professor_roles', 'collegues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
                // 'professor_roles' => 'required',
                'img_path' => 'required',
                'collegues' => 'required',

            ]);
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            try {

                if ($request->img_path) {
                    $image = Image::make($request->img_path)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string) $image, 'public');
                    $request_data['img_path'] = $request->img_path->hashName();
                } //end of if


            } catch (Exception $e) {
                dd($e);
            }

            //Create professor
            $professor = User::create([
                'email' => request('email'),
                'Firstname' => request('Firstname'),
                'Lastname' => request('Lastname'),
                'password' => bcrypt(request('password')),
                'RegYeer' => request('RegYeer'),
                'Gender' => request('Gender'),
                'Address' => request('Address'),
                'About' => request('About'),
                'github' => request('github'),
                'linkedin' => request('linkedin'),
                'mobileNo' => request('mobileNo'),
                'img_path' => $request_data['img_path'],

            ]);

            //assign professor Role
            $professor->syncRoles([$request->professor_roles, 'Professor']);
            $professor->givePermissionTo($request->professor_roles);

            $collegues = request('collegues');
            $professor->professor_collegues()->syncWithoutDetaching($collegues);

            return redirect()->route('admin.professors.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor = User::find($id);
        if ($professor) {

            return json_encode([
                'message' => 'success',
                'professor' => $professor
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

        $collegues = Collegue::get();
        $professor_roles = Role::all();
        // Ignore default Roles [Admin, Professor, Student]
        $professor_roles->forget([0, 1, 2]);

        $professor = User::find($id);
        return view('admin.professors.edit', compact('professor', 'professor_roles', 'collegues'));
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


        $professor = User::find($id);

        if ($professor) {


            try {
                $request_data['img_path'] = $professor->img_path;
                if ($request->img_path) {
                    Storage::disk('public')->delete('images/' . $professor->img_path);

                    $image = Image::make($request->img_path)
                        ->encode('jpg', 50);
                    Storage::disk('public')->put('images/' . $request->img_path->hashName(), (string) $image, 'public');
                    $request_data['img_path'] = $request->img_path->hashName();
                } //end of if


            } catch (Exception $e) {
                dd($e);
            }

            $professor->update([

                'email' => request('email'),
                'Firstname' => request('Firstname'),
                'Lastname' => request('Lastname'),
                'RegYeer' => request('RegYeer'),
                'Gender' => request('Gender'),
                'Address' => request('Address'),
                'About' => request('About'),
                'github' => request('github'),
                'linkedin' => request('linkedin'),
                'mobileNo' => request('mobileNo'),
                'img_path' => $request_data['img_path'],
            ]);

            $collegues = request('collegues');
            $professor->professor_collegues()->sync($collegues);


            try {
                $professor->update(['password' => bcrypt(request('password'))]);
            $role = Role::findByName($request->professor_roles);
            $professor->syncRoles([$request->professor_roles, 'Professor']);
            $professor->givePermissionTo($request->professor_roles);

            } catch (\Throwable $th) {
                //throw $th;
            $professor->syncRoles(['Professor']);
            $professor->givePermissionTo('Professor');


            }
            $professor->update(['img_path' => $request_data['img_path']]);
            return redirect()->route('admin.professors.index');
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

        $professor = User::find($id);
        if ($professor) {
            $professor->delete();
            return redirect()->route('admin.professors.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
