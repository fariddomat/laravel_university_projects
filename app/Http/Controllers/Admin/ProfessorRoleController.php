<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProfessorRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ProfessorRoleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professor_roles=Role::get();

        // Ignore default Roles [Admin, Professor, Student]
        $professor_roles->forget([0 ,1]);
        return view('admin.professor_roles.index', compact('professor_roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.professor_roles.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $role=Role::create(['name' => $request->name]);
        $permission = Permission::create(['name' => $request->name]);

        // ProfessorRole::create([
        //     'name'=>$request->name
        // ]);
        return redirect()->route('admin.professor_roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professor_role = Role::find($id);
        if ($professor_role) {

            return json_encode([
                'message' => 'success',
                'category' => $professor_role
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
        $professor_role=Role::find($id);
        return view('admin.professor_roles.edit', compact('professor_role'));
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
        $professor_role = Role::find($id);
        if ($professor_role) {
            $professor_role->update(['name' => $request->name]);

        return redirect()->route('admin.professor_roles.index');

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
        $professor_role = Role::find($id);
        if ($professor_role) {
            $professor_role->delete();
            return redirect()->route('admin.professor_roles.index');
        } else
            return response()->json(['message' => 'error'], 404);
    }
}
